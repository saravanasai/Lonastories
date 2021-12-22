<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\User\UserContoller;
use App\Http\Controllers\Api\User\UserEnquierysController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//public routes for registering and login to generate token
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register',[AuthController::class,'register']);

Route::group(["middleware" => "auth:sanctum", "prefix" => "v1"], function () {
    Route::get('user', [UserContoller::class, 'userInfo']);
    Route::post('quickEnquiery',[UserEnquierysController::class,'quickEnquiery']);

    Route::post('logout', [AuthController::class, 'logout']);
});
