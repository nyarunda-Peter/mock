<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index(Request $request){

        // Validate
        $data = $request->post();

        $validator = validator($data, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required'],
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }


        // Create account
        $user = User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
        ]);

        auth()->login($user);

        // Login successful
        return redirect()->route('home');

    }
}
