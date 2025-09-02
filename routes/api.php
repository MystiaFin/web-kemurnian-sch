<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroBannerController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\Admin\HeroSectionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Hero Banner routes
Route::get('/hero-banners', [HeroBannerController::class, 'index'])->name('hero-banners.index');
Route::post('/hero-banners', [HeroSectionController::class, 'store'])->name('hero-banners.store');
Route::delete('/hero-banners/{id}', [HeroSectionController::class, 'destroy'])->name('hero-banners.destroy');

// Kurikulum routes
Route::get('/kurikulum', [KurikulumController::class, 'index'])->name('kurikulum.index');