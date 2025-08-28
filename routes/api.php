<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroBannerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Hero Banner routes
Route::get('/hero-banners', [HeroBannerController::class, 'index'])->name('hero-banners.index');
Route::post('/hero-banners', [HeroBannerController::class, 'store'])->name('hero-banners.store');
Route::delete('/hero-banners/{id}', [HeroBannerController::class, 'destroy'])->name('hero-banners.destroy');