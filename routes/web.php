<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsumoController;

Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/register', function () {
    return view('Auth.register');
});

Route::get('/admin', function () {
    return view('Admin.index');
});


Route::get('/insumos', [InsumoController::class, 'index'])->name('insumos.index');

Route::post('/insumos/store', [InsumoController::class, 'store'])->name('insumos.store');