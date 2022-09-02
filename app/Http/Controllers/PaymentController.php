<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puppy;
use App\Models\Order;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use Redirect;

class PaymentController extends Controller
{
    public function stripe(Request $request)
    {
        $puppy = Puppy::where('id', $request->puppyId)->first();
        return view('stripe',['puppy'=>$puppy]);
    }
    
    public function stripePost(Request $request)
    {
        $user = Auth::user();
        $puppy = Puppy::where('id', $request->puppyId)->first();
        if($request->delivery){
            $amount = $puppy->puppy_price + $request->delivery;
            $shiping = $request->delivery;
        }else{
            $amount = $puppy->puppy_price + $request->meet;
            $shiping = $request->meet;
        }
        //save Order Detail In Order Table
        $order = Order::create([
            'user_id' => $user->id,
            'puppy_id' => $puppy->id,
            'username' => $request->firstname . $request->lastname,
            'email' => $request->email,
            'phone_no' => $request->phone,
            'delivery_address' => $request->address .','. $request->state .','. $request->country .','. $request->zipcode,
            'price' => $puppy->puppy_price,
            'charges' => $shiping,
            'total' => $puppy->puppy_price + $shiping,
            'order_status' => 'unpaid',
        ]);
        try{
            $today = date("Y-m-d");
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $cust_id = $user->stripe_id;
                if ($cust_id != null) {
                    $cust_id = $user->stripe_id;
                } else {
                    $customer = \Stripe\Customer::create();
                    $cust_id = $customer->id;
                    $user->update(['stripe_customer_id' => $cust_id]);
                }
                \Stripe\Customer::createSource(
                    $cust_id,
                    ['source' => $request->stripeToken]
                );
            $chargeee = Stripe\Charge::create ([
                    "amount" => $amount * 100,
                    "currency" => "usd",
                    "customer" => $user->stripe_customer_id,
                    "description" => "Successfully Bulldog Purchase" 
            ]);
            $payment = new Payment;
            $payment->s_payment_id = $chargeee['id'];
            $payment->order_id =  $order->id;
            $payment->user_id =  $user->id;
            $payment->valid_date = $today;
            $payment->amount =  $puppy->puppy_price;
            $payment->save();

            $user->update(['stripe_id' => $cust_id]);
            $order_update =$order->update(['order_status'=>'paid']);
            
            return redirect('thankyou');
        }
        catch (Exception $e) {
            $del = $order->delete();
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}
