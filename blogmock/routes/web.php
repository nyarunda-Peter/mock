<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\NewPropertyController;
use App\Http\Controllers\PropertyController;
use App\Models\Type;
use App\Models\User;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;


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

//Index Page Route
Route::get('/', [PropertyController::class, 'index'])->name('home');

//SignUp Form Routes
Route::view('signup', 'auth.signup')->name('signup');
Route::post('signup', [SignupController::class, 'index'])->name('signup');

//Login Form Routes
Route::view('login', 'auth.login')->name('login')->middleware(['guest']);
Route::post('login', [LoginController::class, 'index'])->name('login')->middleware(['guest']);

//Logout Routes
// Route::get('logout', 'auth.logout')->name('logout');

Route::get('logout', [LogoutController::class, 'logout'])->name('logout');


//Property Registration Routes
Route::get('Add-Property', function(){ 
    return view('property.addproperty', [
        'posts' => Category::all(),
        'types' => Type::all()
    ]);
})->name('Add-Property');

//View to Add Property details
// [NewPropertyController::class, 'propertyDetailsForm']

Route::get('Add-Property-Details', function(){
    // dd($request->all());
} )->name('Add-Property-Details');
// Route::post('Add-Property-Details', [NewPropertyController::class, 'index'])->name('Add-Property-Details');

//Property Post Display Route
Route::get('property/{post:slug}',[PropertyController::class, 'showPost'] )->name('view_single_property');

//Category Filtering ->  For Sale || For Rent 
Route::get('categories/{category:slug}', function (Category $category){

    return view('property.index', [
        'posts' => $category->posts,
        'current_category' => $category,
        'types' => Type::all()

    ]);
});

//Type Filtering -> House || Apartment || Plot
Route::get('types/{type:slug}', function (Type $type){

    return view('property.index', [
        'posts' => $type->posts,
        'types' => Type::all()

    ]);
});


//Not Needed soo far
// Route::get('authors/{author:username}', function (User $author){

//     return view('property', [
//         'posts' => $author->posts,
//         'categories' => Category::all(),
//         'types' => Type::all()
//     ]);
// });
