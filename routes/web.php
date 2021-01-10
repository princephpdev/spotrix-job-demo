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
    Route::resource('job', JobController::class);
    Route::resource('user', UserController::class)->only(['index', 'show']);
    Route::get('/roles', function(){
        return view('role');
    })->name('role');
});