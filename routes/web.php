<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');

Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');