<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request){

        // Validate
        $data = $request->post();

        $validator = validator($data, [
            'email' => 'required|email',
            'password' => ['required'],
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }


        // Authenticate
        $user = User::where('email', $request->post('email'))->first();

        if($user == null){
            return back()->withErrors([
                'status' => 'User with the given email not found'
            ]);
        }

        if(!Hash::check($request->get('password'), $user->getAuthPassword())){
            return back()->withErrors(['status' => 'Incorrect credentials']);
        }

        auth()->login($user);

        // Login successful
        return redirect()->route('home');

    }
}
