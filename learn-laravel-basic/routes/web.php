<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;

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

Route::get('index', [DatabaseController::class, 'index']);

Route::get('column', [DatabaseController::class, 'column']);

Route::get('count', [DatabaseController::class, 'countUser']);

Route::get('exist', [DatabaseController::class, 'exist']);

Route::get('select', [DatabaseController::class, 'selectUser']);

Route::get('addColumn', [DatabaseController::class, 'addSelect']);

Route::get('join', [DatabaseController::class, 'join']);

Route::get('leftjoin', [DatabaseController::class, 'leftJoin']);

Route::get('rightjoin', [DatabaseController::class, 'rightJoin']);

Route::get('delete', [DatabaseController::class, 'delete']);
