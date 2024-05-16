<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

//Register
Route::post("register",[ApiController::class,'register']);
//Login
Route::post("login",[ApiController::class,'login']);

Route::group([
    'middleware' => 'auth:sanctum',
],function (){
    //profile
    Route::get('profile',[ApiController::class,'profile']);

    //Logout
    Route::get('logout',[ApiController::class,'logout']);
});



















/*
   Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

*/
