<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\LocalInsumoController;
use App\Http\Controllers\PlatosController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PlatoInsumoController;

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


//demo

Route::get('/demo', [DemoController::class, 'index'])->name('demo.index');

Route::get('/demo/stock', [DemoController::class, 'stock'])->name('demo-stock.index');

Route::post('/demo/localinsumos', [LocalInsumoController::class, 'store'])->name('localinsumos.store');

Route::post('/demo/platos', [PlatosController::class, 'store'])->name('platos.store');

Route::get('/obtener-productos', [DemoController::class, 'obtenerProductos']);



Route::get('/demo/stock', [StockController::class, 'index']);
Route::post('/demo/stock/actualizar', [StockController::class, 'actualizarStock'])->name('actualizar.stock');


Route::post('platoinsumos', [PlatoInsumoController::class, 'store'])->name('platoinsumos.store');