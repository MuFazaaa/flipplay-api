<?php

use App\Http\Controllers\Api\KoleksiController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\PenggunaController;
use Illuminate\Support\Facades\Route;

// ->parameters(): tanpa ini Laravel menyingkat "media" menjadi {medium}
Route::apiResource('media', MediaController::class)->parameters(['media' => 'media']);

Route::get('pengguna', [PenggunaController::class, 'index']);
Route::get('pengguna/{pengguna}', [PenggunaController::class, 'show']);

Route::get('pengguna/{pengguna}/koleksi', [KoleksiController::class, 'index']);
Route::post('pengguna/{pengguna}/koleksi', [KoleksiController::class, 'store']);
Route::delete('pengguna/{pengguna}/koleksi/{media}', [KoleksiController::class, 'destroy']);
