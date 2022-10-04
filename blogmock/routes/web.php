<?php

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

    return view('property', [
        'posts' => Property::all()
    ]);
});

Route::get('property/{post}', function (Property $post) {

    //Find a view by its slug and pass it to a view called "post"
    
    return view('post' , [
        'post' => Property::findOrFail($post)  
    ]);

});
