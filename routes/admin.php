<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginSubmit')->name('login.submit');
    Route::get('/forget-password', 'forgetPassword')->name('forget-password');
    Route::post('/forget-password', 'forgetPasswordSubmit')->name('forget-password.submit');
    Route::get('/reset-password/{token}', 'resetPassword')->name('reset-password');
    Route::post('/reset-password', 'resetPasswordSubmit')->name('reset-password.submit');
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});
