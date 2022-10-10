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


        return view('property.index', [

            'posts' => Property::latest()->filter(request(['search']))->get(),
            'types' => Type::all()

            ]);
    }

    public function showPost(Property $post)
    {
        //Find a view by its slug and pass it to a view called "post"

        return view('property.showPost' , [
            'post' => $post
        ]);
    }

}
