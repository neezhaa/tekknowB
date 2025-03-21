<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::view('/', 'welcome');

Route::get('dashboard', [UserController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('chat/{id}', [UserController::class, 'chatUser'])->middleware(['auth'])->name('chat');

Route::view('profile', 'profile')
->middleware(['auth'])
->name('profile');

require __DIR__.'/auth.php';
