<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroBannerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Hero Banner routes
Route::get('/hero-banners', [HeroBannerController::class, 'index']);
Route::post('/hero-banners', [HeroBannerController::class, 'store']);
Route::delete('/hero-banners/{id}', [HeroBannerController::class, 'destroy']);