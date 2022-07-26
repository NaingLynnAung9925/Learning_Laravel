<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;

use App\Models\Test;
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

Route::get('/', [TestController::class, 'all']);

// Route::get('/test/{id}', function ($id) {
//     return Test::findOrFail($id);
// });


// Route::get('create', [TestController::class , 'create']);

// Route::get('delete', function () {
//     $test = Test::where('phone_no', 999)->delete();
//     echo "$test is Successfully delete";
// });

