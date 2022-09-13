<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\Router;

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

Route::get('/', [UserController::class,'index']);
Route::get('/signup', [UserController::class,'signup']);
Route::post('/user',[UserController::class,'store']);
Route::get('/profile',[UserController::class,'profile']);
Route::post('/login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout']);
Route::post('/update',[UserController::class,'update']);
