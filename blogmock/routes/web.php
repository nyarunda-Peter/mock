<?php

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

Route::get('/', function () {


    \Illuminate\Support\Facades\DB::listen(function($query){
        logger($query->sql
    );
    });

    return view('property', [
        'posts' => Property::latest('created_at')->get(),
        'categories' => Category::all()        
    ]);
    
});

Route::get('property/{post:slug}', function (Property $post) {

    //Find a view by its slug and pass it to a view called "post"
    
    return view('post' , [
        'post' => $post  
    ]);

});

Route::get('categories/{category:slug}', function (Category $category){
    return view('property', [
        'posts' => $category->posts
        
    ]);
});

Route::get('types/{type:slug}', function (Type $type){
    return view('property', [
        'posts' => $type->posts
        
    ]);
});

Route::get('authors/{author:username}', function (User $author){
   
    return view('property', [
        'posts' => $author->posts
        
    ]);
});
