<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('home');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
    Route::middleware(['admin'])->group(function(){
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::resource('job', JobController::class)->except(['index', 'show']);
    });
    Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::resource('job', JobController::class)->only(['index', 'show']);
    // Route::get('/roles', function(){
    //     return view('role');
    // })->name('role');
});