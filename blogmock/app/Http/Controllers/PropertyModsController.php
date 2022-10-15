<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyModsController extends Controller
{
    //
    //Selects all property submitted by the logged in user
    public function SelectProperty()
    {
        $posts = Property::whereUserId(Auth::id())->get();

        return view('property.profile', [
            'posts' => $posts
        ]);
    }
}
