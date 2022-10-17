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
            'fname'=> 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users',
            'password' => ['required'],
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }


        // Create account
        $user = User::create([
            'name' => $request->post('name'),
            'fname' => $request->post('fname'),
            'lname' => $request->post('lname'),
            'email' => $request->post('email'),
            'phone_number' => $request->post('phone_number'),
            'password' => Hash::make($request->post('password')),
        ]);

        auth()->login($user);

        // Login successful
        return redirect()->route('home');

    }
}
