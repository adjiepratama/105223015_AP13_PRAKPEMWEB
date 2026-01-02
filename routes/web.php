<?php
use App\Http\Controllers\AspirasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AspirasiController::class, 'index'])->name('aspirasi.index');
Route::post('/store', [AspirasiController::class, 'store'])->name('aspirasi.store');