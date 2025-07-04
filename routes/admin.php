<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\TestimonialController;

################## Auth Routes ###############
Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginSubmit')->name('login.submit');
    Route::get('/forget-password', 'forgetPassword')->name('forget-password');
    Route::post('/forget-password', 'forgetPasswordSubmit')->name('forget-password.submit');
    Route::get('/reset-password/{tokenUrl}', 'resetPassword')->name('reset-password');
    Route::post('/reset-password', 'resetPasswordSubmit')->name('reset-password.submit');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');
});

################## Services Routes ###############
Route::middleware('auth')->controller(ServiceController::class)->group(function(){
    Route::get('/services', 'index')->name('services.index');
    Route::post('/services','store')->name('services.store');
    Route::get('/services/{id}/edit','edit')->name('services.edit');
    Route::post('/services/{id}','update')->name('services.update');
    Route::delete('/services/{id}','destroy')->name('services.destroy');
});

################## Projects Routes ###############
Route::middleware('auth')->controller(ProjectController::class)->group(function(){
    Route::get('/projects', 'index')->name('projects.index');
    Route::post('/projects', 'store')->name('projects.store');

    Route::delete('/projects/{id}', 'delete')->name('projects.delete');
    Route::get('/projects/{id}/edit', 'edit')->name('projects.edit');
    Route::post('/projects/{id}', 'update')->name('projects.update');
});

################## Blogs Routes ###############
Route::middleware('auth')->controller(BlogController::class)->group(function(){
Route::get('blogs', 'index')->name('blogs.index');
Route::post('blogs/save', 'save')->name('blogs.save');
Route::get('blogs/{id}', 'getBlog')->name('blogs.get');
Route::get('/blogs/delete/{id}', 'delete')->name('blogs.delete');
});

################## Testimonial Routes ###############
Route::middleware('auth')->controller(TestimonialController::class)->group(function(){
    Route::get('/testimonials', 'index')->name('testimonials.index');
    Route::post('/testimonials', 'store')->name('testimonials.store');
    Route::get('/testimonials/edit/{id}', 'edit')->name('testimonial.edit');
    Route::post('/testimonials/{id}', 'update')->name('testimonial.update');
    Route::delete('/testimonials/{id}', 'destroy')->name('testimonial.destroy');
});