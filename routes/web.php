<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource(
    'employee',EmployeeController::class
);
Route::get('cre')


