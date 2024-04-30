<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// For adding an employee
Route::get('/', 'App\Http\Controllers\EmployeeController@index')->name('employees.index');
Route::get('/create', 'App\Http\Controllers\EmployeeController@create')->name('employees.create');
Route::post('/employees', 'App\Http\Controllers\EmployeeController@store')->name('employees.store');

// For deleting an employee
Route::delete('/employees/{employee}', 'App\Http\Controllers\EmployeeController@destroy')->name('employees.destroy');

// For editing an employee
Route::get('/employees/{employee}/edit', 'App\Http\Controllers\EmployeeController@edit')->name('employees.edit');
Route::put('/employees/{employee}', 'App\Http\Controllers\EmployeeController@update')->name('employees.update');
