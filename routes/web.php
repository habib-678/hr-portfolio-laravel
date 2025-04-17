<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index']);

Route::get('/users', [UserController::class, 'users'])->name('users');
Route::get('users/data', [UserController::class, 'data'])->name('users.data');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::get('/user/view/{id}', [UserController::class, 'view'])->name('user.view');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
