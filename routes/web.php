<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// TAMBAHKAN ROUTE LOGIN INI
Route::get('/login', function () {
    return response()->json([
        'success' => false,
        'message' => 'Unauthenticated. Token JWT required.'
    ], 401);
})->name('login');
