<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GalleryController::class, 'index']);
Route::get('/show/{id}', [GalleryController::class, 'show']);

Route::get('/manage-gallery', [GalleryController::class, 'manage']);
Route::get('/create', [GalleryController::class, 'create']);
Route::post('/gallery', [GalleryController::class, 'store']);
Route::delete('/delete/{id}', [GalleryController::class, 'destroy']);
Route::get('/edit/{id}', [GalleryController::class, 'edit']);

Route::put('/update/{id}', [GalleryController::class, 'update']);
