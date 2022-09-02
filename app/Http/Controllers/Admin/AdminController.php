<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Puppy;
use App\Models\Order;
use App\Models\Article;
use App\Models\Breed;
use App\Models\User;
use App\Models\AskAboutMe;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $products = Order::count();
        $quotes = User::count();
        $users = User::count();
        $user = User::count();
        $drivers = User::count();
        $today_quote = User::whereDate('created_at', Carbon::today())->get();
        return view('admin/pages/index', ['products'=>$products, 'quotes'=>$quotes, 'today_quote'=>$today_quote, 'users'=>$users, 'drivers'=>$drivers]);
    }
    public function addPuppy()
    {
        $data = Puppy::all();
        $breed = Breed::all();
        return view('admin/pages/addProduct',['data'=>$data, 'breed'=>$breed]);
    }
    

    public function storeData(Request $request)
    {
        //Image
        if ($request->hasFile('image')) {
            //upload new file
            $extension = $request->image->extension();
            $filename = time() . "_." . $extension;
            $request->image->move(public_path('assets/images/puppyimages'), $filename);
            $request['image'] = $filename;
        }

        $product = Puppy::create([
            'puppy_name' => $request->puppy_name,
            'puppy_price' => $request->puppy_price,
            'puppy_color' => $request->puppy_color,
            'puppy_breed' => $request->puppy_breed,
            'mom_weight' => $request->mom_weight,
            'dad_weight' => $request->dad_weight,
            'available' => $request->available,
            'gender' => $request->puppy_gender,
            'puppy_dob' => $request->puppy_dob,
            'puppy_image' => $filename,
            'puppy_short_description' => $request->puppy_short_description
        ]);
        return back()->with('success','Puppy added successfully!');
    }

    public function edit(Request $request)
    {
        $puppy = Puppy::find($request->id);
        $breed = Breed::all();
        return view('admin/pages/editProduct',['data'=>$puppy, 'breed'=>$breed]);
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $puppy = Puppy::find($request->id);
        if ($request->hasFile('image')) {
            //code for remove old file
            if ($puppy->puppy_image != null) {
                $url_path = parse_url($puppy->puppy_image, PHP_URL_PATH);
                $basename = pathinfo($url_path, PATHINFO_BASENAME);
                $file_old =  public_path("/assets/images/puppyimages/$basename");
                unlink($file_old);
            }
            //upload new file
            $extension = $request->image->extension();
            $filename = time() . "_." . $extension;
            $request->image->move(public_path('assets/images/puppyimages'), $filename);
            $input['puppy_image'] = $filename;
        }
        $update = $puppy->update($input);
        return redirect('admin/addPuppy')->with('success','Puppy Updated successfully!');
    }

    public function delete(Request $request)
    {
        $update = Puppy::where('id', $request->id)->delete();
        return back()->with('error','Puppy Deleted successfully!');
    }

    public function addBreed()
    {
        $data = Breed::all();
        return view('admin/pages/category',['data'=>$data]);
    }

    public function storeBreed(Request $request)
    {
        $breed = Breed::create([
            'breed_name' => $request->breed_name,
        ]);
        return back()->with('success', 'Breed Added Successfully');
    }
    public function updateBreed(Request $request)
    {
        $breed = Breed::where('id', $request->id)->update([
            'breed_name' => $request->breed_name,
        ]);
        return back()->with('success', 'Breed Updated Successfully');
    }
    public function deleteBreed(Request $request)
    {
        $get_breed = Breed::where('id', $request->id)->first(); 
        $get_puppy = Puppy::where('puppy_breed', $get_breed->puppy_breed)->get();
        if($get_puppy != []){
            $breed = $get_breed->delete();
            return back()->with('error', 'Breed Deleted Successfully');
        }else{
            return back()->with('error', 'Puppy Added Against This Breed');
        }
        
    }
    
    public function article()
    {
        $data = Article::all();
        return view('admin/pages/article',['data'=>$data]);
    }

    public function storeArticle(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            //upload new file
            $extension = $request->image->extension();
            $filename = time() . "_." . $extension;
            $request->image->move(public_path('/assets/images/article'), $filename);
            $input['image'] = $filename;
        }
        $input['date'] = Carbon::now()->toFormattedDateString();
        $breed = Article::create($input);
        return back()->with('success', 'Article Added Successfully');
    }

    public function editArticle(Request $request)
    {
        $get_data = Article::find($request->id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            //code for remove old file
            if ($get_data->image != null) {
                $url_path = parse_url($get_data->image, PHP_URL_PATH);
                $basename = pathinfo($url_path, PATHINFO_BASENAME);
                $file_old =  public_path("/assets/images/article/$basename");
                unlink($file_old);
            }
            //upload new file
            $extension = $request->image->extension();
            $filename = time() . "_." . $extension;
            $request->image->move(public_path('/assets/images/article'), $filename);
            $input['image'] = $filename;
        }

        $breed = $get_data->update($input);
        return back()->with('success', 'Article Updated Successfully');
    }

    public function deleteArticle(Request $request)
    {
        $get_data = Article::where('id', $request->id)->first();
        $breed = $get_data->delete();
        return back()->with('error', 'Article Deleted Successfully');
    }

    public function orders()
    {
        $data = Order::with(['user', 'puppy'])->get();
        return view('admin/pages/order',['data'=>$data]);
    }
    
    public function about_me()
    {
        $data = AskAboutMe::with(['user', 'puppy'])->get();
        return view('admin/pages/about_me',['data'=>$data]);
    }
    
    public function deleteask(Request $request)
    {
        $id = $request->id;
        $data = AskAboutMe::where('id', $id)->delete();
        return back()->with('error', 'Deleted Successfully');
    }

}

