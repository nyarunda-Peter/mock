<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\NewPropertyController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyModsController;
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

Route::get('/', [PropertyController::class, 'index'])->name('home');

Route::view('login', 'auth.login')->name('login')->middleware(['guest']);
Route::post('login', [LoginController::class, 'index'])->name('login')->middleware(['guest']);

Route::view('signup', 'auth.signup')->name('signup');
Route::post('signup', [SignupController::class, 'index'])->name('signup');

Route::middleware(['auth'])
->group(function(){

    Route::get('Add-Property', [NewPropertyController::class, 'stepOne'])->name('Add-Property');
    Route::post('Add-Property', [NewPropertyController::class, 'stepTwo'])->name('Add-Property');
    Route::post('Add-Property/store', [NewPropertyController::class, 'store'])->name('StoreProperty');
    
});

Route::get('property/{post:slug}',[PropertyController::class, 'showPost'] )->name('view_single_property');

Route::get('profile', [ PropertyModsController::class, 'SelectProperty'])->middleware(['auth'])->name('profile');

Route::get('categories/{category:slug}', function (Category $category){

    return view('property.index', [
        'posts' => $category->posts,
        'current_category' => $category,
        'types' => Type::all()

    ]);
});

Route::get('types/{type:slug}', function (Type $type){

    return view('property.index', [
        'posts' => $type->posts,
        'types' => Type::all()

    ]);
});


//Not Needed so far
// Route::get('authors/{author:username}', function (User $author){

//     return view('property', [
//         'posts' => $author->posts,
//         'categories' => Category::all(),
//         'types' => Type::all()
//     ]);
// });
