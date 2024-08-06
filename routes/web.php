<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login;
use \App\Http\Controllers\Auth\Logout;

Route::get('/', function () {return view('welcome');})->name('welcomeView');
Route::get('/login', [Login::class, 'index'])->name('loginView');
Route::get('profile', [Logout::class, 'profile'])->name('profile')->middleware('auth');

Route::post('logout', [Logout::class, 'logout'])->name('logout')->middleware('auth');
Route::post('login', [Login::class, 'login'])->name('login');
Route::put('update', [Logout::class, 'update'])->name('update')->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\dashboard::class, 'index'])->name('admin.dashboard');
    Route::resources([
        'companies' => \App\Http\Controllers\admin\CompaniesController::class,
        'employees' => \App\Http\Controllers\admin\EmployeeController::class,
    ]);
});

