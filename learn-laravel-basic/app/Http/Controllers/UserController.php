<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function register()
    {
        return view('login.register');
    }

    public function store(RegisterRequest $request){
        $user = new User();
        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('login.auth')->with('success', 'User created successfully');
    }
}
