<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Models\Puppy;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/home', [BasicController::class, 'home']);

Route::post('/frenchdogs', [BasicController::class, 'frenchdogs']);

Route::get('/puppyBreed', [BasicController::class, 'puppyBreed']);

Route::get('/puppyTravel', [BasicController::class, 'puppyTravel']);

Route::get('/promise', [BasicController::class, 'promise']);

Route::get('/puppyHealth', [BasicController::class, 'puppyHealth']);

Route::get('/reviews', [BasicController::class, 'reviews']);

Route::get('/gives_back', [BasicController::class, 'gives_back']);

Route::get('/resource', [BasicController::class, 'resource']);

Route::get('/article/{id}', [BasicController::class, 'article']);

Route::get('/articleDetail/{id}', [BasicController::class, 'articleDetail']);

Route::get('/contactus', [BasicController::class, 'contactus']);

Route::get('/about', [BasicController::class, 'about']);

Route::get('/selPuppy', [BasicController::class, 'selPuppy']);

Route::post('/puppy_details', [BasicController::class, 'product_details']);

Route::post('sendQuote', [BasicController::class, 'sendQuote']);

Route::get('category', [BasicController::class, 'category']);

Route::get('search', [BasicController::class, 'search']);

Route::get('success', [BasicController::class, 'success']);

//User Auth web Route
Route::get('showlogin', [BasicController::class, 'showlogin']);
Route::get('showregister', [BasicController::class, 'showregister']);
Route::get('showforgot', [BasicController::class, 'showforgot']);
Route::get('showcode', [BasicController::class, 'showcode']);
Route::get('showchange', [BasicController::class, 'showchange']);

Route::post('storelogin', [UserController::class, 'login']);
Route::post('storeregister', [UserController::class, 'register']);
Route::post('forgot', [UserController::class, 'forgot']);
Route::post('confirm-code', [UserController::class, 'confirmCode']);
Route::post('reset', [UserController::class, 'reset']);
Route::get('logout',[UserController::class,'logout']);
Route::post('change-password', [UserController::class, 'changePassword']); //Bear Token Needed
Route::post('edit', [UserController::class, 'edit']);
Route::post('verify', [UserController::class, 'verifyEmail']);
Route::get('details', [UserController::class, 'details']); //Bear Token Needed
Route::get('delete-user', [UserController::class, 'delete']); //Delete All user
Route::post('update-fcm', [UserController::class, 'updateFcmToken']);
Route::get('how-to-use', [FilterController::class, 'howToUse']); //How To Use

Route::group(['middleware' => ['auth']], function () {

    Route::post('stripeForm',[PaymentController::class,'stripe']);
    Route::post('stripe', [PaymentController::class,'stripePost'])->name('stripe.post');  
    Route::get('thankyou', function () {
        return view('thank');
    }); 
    
    Route::post('/about_me', [BasicController::class, 'about_me']);

});


    



