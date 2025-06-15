<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('login');
Route::get('/projects/{id}', [FrontendController::class, 'getProjects']);

Route::get('/users', [UserController::class, 'users'])->name('users');
Route::get('users/data', [UserController::class, 'data'])->name('users.data');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::get('/user/view/{id}', [UserController::class, 'view'])->name('user.view');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');


Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('contact', [FrontendController::class, 'contactSubmit'])->name('contact.submit');
Route::get('projects', [FrontendController::class, 'projects'])->name('projects');
Route::get('blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('blog/{slug}', [FrontendController::class, 'showBlog'])->name('blog.show');

//fallback route
Route::fallback(function () {
    return view('frontend.404');
})->name('fallback.404');