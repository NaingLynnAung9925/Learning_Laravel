<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SendEmailController;



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

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);



Route::get('test', [HomeController::class, 'test']);

Route::get('/profile', function(){

})->middleware('auth.basic');

Route::get('send-mail', [SendEmailController::class, 'index']);

Route::view('image', 'mail');