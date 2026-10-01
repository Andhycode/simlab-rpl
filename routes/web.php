<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [BarangController::class, 'dashboard'])->name('dashboard');

Route::resource('barang', BarangController::class);