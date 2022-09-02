<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmailVerfication;
use App\Models\RequestNotification;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Promotion;
use App\Notifications\EmailVerificationRequest;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\Http\Resources\ProfileSendProductResource;
use App\Http\Resources\ProfileReceivedProductResource;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;
use Redirect;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;
use Validator;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 404;
    public function register(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'first_name'=>'required',
            'email' => 'unique:users|required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        //If any Validation fail
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        //Image
        if ($request->hasFile('image')) {
            //upload new file
            $extension = $request->image->extension();
            $filename = time() . "_." . $extension;
            $request->image->move(public_path('/assets/images/user'), $filename);
            $input['image'] = $filename;
        }



        //Convert Password into hash
        $input['password'] = bcrypt($input['password']);
        $input['username'] = $request->first_name . $request->last_name;

        //Create User
        $user = User::create($input);

        //Update Token created user

        $api_token = $user->createToken($user->email)->accessToken;
        User::where('id', $user->id)->update(['api_token' => $api_token]);

        // $emailverfication = EmailVerfication::updateOrCreate(['email' => $user->email],
        //     [
        //         'email' => $user->email,
        //         'pin' => mt_rand(1000, 9999),
        //     ]
        // );
        $user = User::find($user->id);
        if ($user) {
            // $user->notify(
            //     new EmailVerificationRequest($emailverfication->pin)
            // );
            return redirect('showlogin');
        }

    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $api_token = $user->createToken($user->email)->accessToken;
            if ($request->fcm_token) {
                $user->fcm_token = $request->fcm_token;
                $user->image_url = $request->image_url;
                $user->update();
            }
            $user->save();
            return redirect('/home');
        } else {
            return Redirect::back()->withErrors('Invalid Email or Password');
        }
    }

    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['message' => "User Not found", 'status' => 'error'], $this->errorStatus);
        }
        return response()->json([
            "userdata" => $user,
            "message" => "Get User Data Successfully",
            "status" => 'success'
        ], $this->successStatus);
    }

    // forgot password methods
    public function forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return Redirect::back()->withErrors('We cannot find a user with that e-mail address');

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'pin' => mt_rand(1000, 9999),
            ]
        );
        if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($passwordReset->pin)
            );
        return view('/auth/code', ['email'=>$user]);
    }


//Update fcm token

    public function updateFcmToken(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['message'=> "User Not found", 'status' => 'error'], $this->errorStatus);
        }
        User::where('id',$user->id)->update(['fcm_token'=>$request->fcm_token]);
    }


    public function confirmCode(Request $request)
    {
        $token = $request->token;
        $email = $request->email;
        $token = $token[0].$token[1].$token[2].$token[3];
      
        $passwordReset = PasswordReset::where('pin', $token)->where('email', $email)->first();
        if (!$passwordReset)
            return Redirect::back()->withErrors('This password reset token is invalid.');
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return Redirect::back()->withErrors('This password reset token is invalid.');
        }
        return view('/auth/change', ['passwordReset'=>$passwordReset]);
    }


    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find(Request $request)
    {
        $token = $request->token;

        $passwordReset = PasswordReset::where('token', $token)
            ->first();
        if (!$passwordReset)
            return response()->json([
                'error' => "This password reset token is invalid.", 'status' => 'error'
            ], 404);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'error' => "This password reset token is invalid.", 'status' => 'error'
            ], 404);
        }
        return response()->json([$passwordReset,
            "message" => "Success",
            "status" => "success"]);
    }

    /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $passwordReset = PasswordReset::where([
            ['pin', $request->token],
            ['email', $request->email]
        ])->first();
        if (!$passwordReset)
            return Redirect::back()->withErrors('This password reset token is invalid.');
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user)
            return Redirect::back()->withErrors('This password reset token is invalid.');
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return redirect('showlogin')->withErrors('success', 'Password Reset Successfully');
    }

    public function edit(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['message' => "User Not found", 'status' => 'error'], $this->errorStatus);
        }

        if ($request) {
            $requests = $request->except('password_confirmation');
            $input = $requests;

            if ($request->hasFile('image')) {

                //code for remove old file

                if ($user->image != null) {
                    $url_path = parse_url($user->image, PHP_URL_PATH);
                    $basename = pathinfo($url_path, PATHINFO_BASENAME);
                    $file_old =  public_path("assets/images/user/$basename");
                    unlink($file_old);
                }
                //upload new file
                $extension = $request->image->extension();
                $filename = time() . "_." . $extension;
                $request->image->move(public_path('/assets/images/user'), $filename);
                $input['image'] = $filename;
            }

            if($request->password != null && $request->password_confirmation != null)
            {
                if($request->password_confirmation == $request->password)
                    $input['password'] = Hash::make($request->password);
                else
                    return response()->json(['message' => 'Your Password and Confirm are mismatch', 'status' => 'error'], $this->errorStatus);
            }

            //prevent user not update email
            $input['email'] = $user->email;
            User::where('id', $user->id)->update($input);
            $userdata= User::find($user->id);
              $api_token = $userdata->createToken($userdata->email)->accessToken;
            return response()->json(
                ['userdata' => $userdata,
                 "token"=>$api_token,
                 'message' => "User Data Updated Successfully", 'status' => 'success'],$this->successStatus);
              } else {
            return response()->json(['error' => "User Data was not Updated ", 'status' => 'error'],$this->errorStatus);
        }

    }

    public function changePassword(Request $request)
    {
        $user_id = auth('api')->user()->id;
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['message' => 'User not found by this Id', 'status' => 'error'], $this->errorStatus);
        }

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|confirmed|min:6|max:11',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 'error'], $this->errorStatus);
        }

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill(['password' => Hash::make($request->password)])->save();
            return response()->json(['userdata' => $user, 'status' => 'success'], $this->successStatus);
        } else {
            $error['old_password'] = ['Your old password was incorrect'];

            return response()->json(['message' => $error, 'status' => 'error'], $this->errorStatus);
        }

    }


    public function verifyEmail(Request $request)
    {

        $token = $request->pin;

        $emailverfication = EmailVerfication::where('pin', $token)->first();
        if (!$emailverfication)
            return response()->json([
                'error' => "This Verfication Code is invalid."
            ], $this->errorStatus);
        User::where('email', $emailverfication->email)->update(['email_verified_at' => Carbon::now()]);
        $user = User::where('email', $emailverfication->email)->first();

        $user->api_token = $user->createToken($emailverfication->email)->accessToken;
        if (!$emailverfication)
            return response()->json([
                'message' => "This Verfication Code is invalid.", 'status' => 'error'
            ], $this->errorStatus);
        if (Carbon::parse($emailverfication->updated_at)->addMinutes(720)->isPast()) {
            $emailverfication->delete();
            return response()->json([
                'message' => "Pin Expired.", 'status' => 'error'
            ], $this->errorStatus);
        }
        return response()->json([$user,
            "success" => "Email Verfied Successfully"],$this->successStatus);
    }

    public function confirmPassword($id, Request $request)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found by this Id', 'status' => 'error'], $this->errorStatus);
        }
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'This password confirmation not match', 'status' => 'error'], $this->errorStatus);
        }

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill(['password' => Hash::make($request->password)])->save();
            return response()->json(['userdata' => $user, 'status' => 'success'], $this->successStatus);
        } else {

            return response()->json(['message' => 'Your old password was incorrect', 'status' => 'error'], $this->errorStatus);
        }

    }

    public function delete() {
        $user = User::where('id','>',0)->delete();
        if($user)
            return response()->json(['message' => "User  Deleted", 'status' => 'success']);
        else
            return response()->json(['message' => "User Not Deleted", 'status' => 'error'], $this->errorStatus);
    }
    
    
     public function profile($post_or_city = null)
    {
        $user = auth('api')->user();
        $promotion = Promotion::query();
        
        if (!$user) {
            return response()->json(['message' => "User Not found", 'status' => 'error'], $this->errorStatus);
        }
   
        $send_order_id = Order::where('user_id',$user->id)->pluck('id');
        $received_order_id = Order::where('receiver_id',$user->id)->pluck('id');
        
        $send_order_product    =  OrderDetail::whereIn('order_id',$send_order_id)->get();
        $send_gift = ProfileSendProductResource::collection($send_order_product);
                                  
        $received_order_product =  OrderDetail::whereIn('order_id',$received_order_id)->get();
        $received_gift = ProfileReceivedProductResource::collection($received_order_product);
        
        //If Postal code or City Entered 
        if($post_or_city)
        {
            $promotion =  $promotion->where('postal_code',$post_or_city)->orWhere('city', 'LIKE', "%{$post_or_city}%");
        }
            $promotion = $promotion->where('status',1)->orderBy('order_by')->get();
            
            
        return response()->json([
            "userdata" => $user,
            'send_gift'=>$send_gift,
            'promotions'=>$promotion,
            'received_gift'=>$received_gift,
            "message" => "Get User Data Successfully",
            "status" => 'success'
        ], $this->successStatus);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
