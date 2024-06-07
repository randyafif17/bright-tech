<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontendController;

Route::get('/', [frontendController::class, 'index'])->name('frontend');
Route::post('/tasks', [frontendController::class, 'store'])->name('tasks.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
