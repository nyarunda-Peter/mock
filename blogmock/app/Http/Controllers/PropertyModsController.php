<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Feature;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyModsController extends Controller
{
    //
    //Selects all property submitted by the logged in user
    public function SelectProfile()
    {
        $posts = Property::whereUserId(Auth::id())->get();

        return view('property.profile', [
            'posts' => $posts
        ]);
    }

    public function SelectProperty()
    {
        $features = Feature::all();

        $grouped = [];

        foreach($features as $feature){
            if(!array_key_exists($feature->type, $grouped)){
                $grouped[$feature->type] = [];
            }

            array_push($grouped[$feature->type], $feature);
        }
        
        return view('property.showProperty', [
            'categories' => Category::all(),
            'types' => Type::all(),
            'features' => $grouped
        ]);
    }

}
