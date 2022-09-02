<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puppy;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Breed;
use App\Models\UserQuote;
use App\Models\Article;
use App\Models\AskAboutMe;
use Carbon\Carbon;

class BasicController extends Controller
{
    //Login Pages Functions   
    public function showlogin()
    {
        return view('auth/login');
    }
    public function showregister()
    {
        return view('auth/signup');
    }
    public function showforgot()
    {
        return view('auth/forgot');
    }
    public function showcode()
    {
        return view('auth/code');
    }
    public function showchange()
    {
        return view('auth/change');
    }
    //

    //Web Function
    public function home()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->pluck('puppy_id');
        $array = collect($order)->unique();
        $order_puppy = Puppy::whereIn('id', $array)->take(4)->get();
        return view('index',['order_puppy'=>$order_puppy]);
    }

    public function search(Request $request)
    {
        $data = Puppy::where('puppy_breed', 'LIKE', '%' . $request->search . '%')->orWhere('puppy_name', 'LIKE', '%' . $request->search . '%')->get();
        return view('searchPuppy', ['data'=>$data, 'search'=>$request->search]);
    }

    public function frenchdogs(Request $request)
    {
        $breed = $request->breed;
        $gender = $request->gender;
        $color = $request->color;
        $allBreed = Breed::all();
        if ($breed != null) {
            $data = Puppy::where('puppy_breed', $breed)->get();
            return view('allPuppies', ['data'=>$data, 'breed'=>$allBreed]);
        }elseif ($gender != null) {
            $data = Puppy::where('gender', $gender)->get();
            return view('allPuppies', ['data'=>$data, 'breed'=>$allBreed]);
        }elseif ($color != null) {
            $data = Puppy::where('puppy_color', $color)->get();
            return view('allPuppies', ['data'=>$data, 'breed'=>$allBreed]);
        }
        else{
            $data = Puppy::all();
            return view('allPuppies', ['data'=>$data, 'breed'=>$allBreed]);
        }
    }

    public function product_details(Request $request)
    {
        $id = $request->id;
        $data = Puppy::where('id', $id)->first();
        return view('adopt-single', ['data'=>$data]);
    }

    public function promise()
    {
        return view('promise');
    }

    public function puppyBreed()
    {
        return view('breeder');
    }

    public function puppyTravel()
    {
        return view('travel');
    }

    public function puppyHealth()
    {
        return view('health');
    }

    public function reviews()
    {
        return view('review');
    }

    public function gives_back()
    {
        return view('givesback');
    }

    public function resource()
    {
        return view('resource');
    }

    public function article($id)
    {
        $data = Article::where('category', $id)->get();
        return view('articles', ['data'=>$data, 'name'=>$id]);
    }
    
    public function articleDetail($id)
    {
        $data = Article::find($id);
        return view('articleDetail', ['data'=>$data]);
    }

    public function contactus()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function selPuppy()
    {
        $breed = Breed::all();
        return view('selPuppy',['breed'=>$breed]);
    }
    
    public function about_me(Request $request)
    {
        $user = Auth::user();
        $data = AskAboutMe::create([
                'user_id' => $user->id,
                'puppy_id' => $request->puppy_id,
                'about_me' => $request->about_me,
        ]);
        return redirect('success');
    }

    public function success()
    {
        return view('success');
    }

    public function sendQuote(Request $request)
    {
        $quote = UserQuote::create([
            'product_id' => $request->product_id,
            'username' => $request->username,
            'email' => $request->email,
            'company' => $request->company,
            'contact' => $request->number,
            'country' => $request->country,
            'address' => $request->address,
            'enquiry' => $request->enquiry,
        ]);

        return view('Successmessage', ['id'=> $request->product_id]);    
    }

}
