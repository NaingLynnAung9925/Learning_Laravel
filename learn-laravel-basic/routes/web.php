<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\PhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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


Route::get('user/{id}', [UserController::class, 'show']);


Route::get('photos/popular', [PhotoController::class, 'popular']);
Route::resource('photos', PhotoController::class);
// Custom missing model

// Route::resource('photos', PhotoController::class)
//     ->missing(function (Request $request){
//         return Redirect::route('photos.index');
// });


// Partial Resource

// Route::resource('photos', PhotoController::class)->only([
//     'index', 'show'
// ]);

// Route::resource('photos', PhotoController::class)->except([
//     'create', 'store', 'update', 'destroy'
// ]);

//Name Resource Routes

// Route::resource('photos', PhotoController::class)->names([
//     'create' => 'photos.build'
// ]);

