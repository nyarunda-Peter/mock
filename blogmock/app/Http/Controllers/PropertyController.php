<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Type;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //
    public function index()
    {
        
    
        return view('property', [
                
            'posts' => Property::latest()->filter(request(['search']))->get(),
            'categories' => Category::all(),
            'types' => Type::all()
        
            ]);
    }

    public function showPost(Post $post)
    {
        //Find a view by its slug and pass it to a view called "post"
   
        return view('post' , [
            'post' => $post  
        ]);
    }

}
