<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/admin', function () {
    return view('admin');
})->name('admin')->middleware('auth');

Route::get('/employee', function () {
    return view('employee');
})->name('employee')->middleware('auth');

Route::get('/leave', function () {
    return view('leave');
})->name('leave')->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('layouts.partial.admin_dashboard');
})->name('admin_dashboard');

// Route for guest view
Route::get('/admin/guest', function () {
    return view('layouts.partial.guest_dashboard');
})->name('admin_guest');


// For listing employees
Route::get('/employee', 'App\Http\Controllers\EmployeeController@index')->name('employee')->middleware('auth');


// For displaying the employee creation form
Route::get('/employee/create', 'App\Http\Controllers\EmployeeController@create')->name('create')->middleware('auth');

// For storing a new employee
Route::post('/employee', 'App\Http\Controllers\EmployeeController@store')->name('store')->middleware('auth')->middleware('auth');

// For deleting an employee
Route::delete('/employee/{employee}', 'App\Http\Controllers\EmployeeController@destroy')->name('destroy')->middleware('auth');

// For editing an employee
Route::get('/employees/{employee}/edit', 'App\Http\Controllers\EmployeeController@edit')->name('edit')->middleware('auth');
Route::put('/employees/{employee}', 'App\Http\Controllers\EmployeeController@update')->name('update')->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
