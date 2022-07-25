<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Redirect

Route::redirect('/here', '/there');

// View

Route::view('/view', '/about', ['name'=>'unknow']);

//Require Parameter

Route::get('users/{id}', function ($id) {
    return 'User'. $id ;
});

Route::get('post/{postId}/user/{userId}', function ($postId, $userId) {
    return "This is $postId and User id is $userId";
});


// Optional Parameter

Route::get('customer/{name?}', function ($name = "Customer") {
    return "Customer name is ". $name;
});

// Regular Expression

Route::get('client/{id}/{name}', function ($id, $name) {
    return "Client id is $id and Name is $name";
})->whereNumber('id')->whereAlpha('name');

Route::get('category/{category}', function ($category) {
    return $category;
})->whereIn('category', ['movie', 'song', 'painting']);

// Name routes

// Route::get('home', function () {
//     return view('home');
// })->name('home');

Route::get('/about-me', function () {
    return view("about");
})->name('about');

Route::get('user/{id?}/profile', function ($id) {
    return view('user', ['id'=>$id]);
})->name('profile');

// Route Prefix

Route::prefix('admin')->group(function(){
    Route::get('/home', function () {
        return view('home');
    });
});

Route::name('admin.')->group(function(){
    Route::get('/user', function () {
        return view('user');
    })->name('user');
});

