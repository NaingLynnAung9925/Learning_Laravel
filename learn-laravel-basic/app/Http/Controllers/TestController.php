<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function info(Request $request)
    {
        return view('info', ['name' => $request->name, 'email' => $request->email]);
    }
}
