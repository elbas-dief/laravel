<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;


Route::get('/', [HomeController::class, 'index']); // Route adalah class, get adalah method
Route::get('/hello-world', [HomeController::class, 'helloWorld']);

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::get('/login', fn () => redirect()->route('login'))->name('login');

Route::get('/book', [BookController::class, 'index'])->name('book.index');