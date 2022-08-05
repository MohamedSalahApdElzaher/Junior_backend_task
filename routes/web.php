<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// company resource controller
Route::resource('companies', \App\Http\Controllers\CompanyController::class);

// employee resource controller
Route::resource('employees', \App\Http\Controllers\EmployeeController::class);

