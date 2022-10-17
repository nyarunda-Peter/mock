<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Type;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Property;
use App\Models\PropertyFeature;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //
    public function index()
    {


        return view('property.index', [

            'posts' => Property::latest()->filter(request(['search']))->get(),
            'types' => Type::all(),
            'categories' => Category::all()

            ]);
    }

    public function showPost(Property $post)
    {
        //Collecting Attached Features
        // $name = [];
        // foreach ($post->features as $feature) {
        //     array_push($name, $feature->name);
        // }
        //dd($name);
        
        return view('property.showPost' , [
            'post' => $post

        ]);
    }

}
