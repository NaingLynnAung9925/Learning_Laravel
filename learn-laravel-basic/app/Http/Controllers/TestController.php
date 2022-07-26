<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function test()
    {
        foreach(Test::all() as $test)
        {
            return view('test', ["name" =>"$test->name", "phone" => "$test->phone_no"]);
        }
    }

    public function all()
    {
        return view("test", ["all" => Test::all()]);
    }
}
