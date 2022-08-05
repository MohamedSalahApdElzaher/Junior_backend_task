<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// company resource controller
Route::resource('companies', \App\Http\Controllers\CompanyController::class);

// employee resource controller
Route::resource('employees', \App\Http\Controllers\EmployeeController::class);

// datatables routes
Route::get('datatable', [\App\Http\Controllers\DataTableController::class, 'index']);
Route::get('get', [\App\Http\Controllers\DataTableController::class, 'get']);


