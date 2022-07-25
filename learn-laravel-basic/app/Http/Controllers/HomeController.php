<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create(Request $request)
    {
       return view('info',[
        "title" => $request->title,
        "body" => $request->body,
        "image" => $request->image
       ]);
    }
}
