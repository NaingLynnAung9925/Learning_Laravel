<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    public function login()
    {
        return view('login.auth');
    }

    public function store(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        $credentials = [
            'email' => $user->email,
            'password' => $request->password
        ];
        // $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)){
            
            return redirect()->route('login.success')->with('success', "Login Successfully");
        }
        return redirect()->route('login.auth')->with('success', 'Email or Password incorrect. Please try again');
    }
}
