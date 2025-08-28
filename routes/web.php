<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\KurikulumSectionController;
use App\Http\Controllers\Admin\NewsApprovalController;
use App\Http\Controllers\Admin\NewsSectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/hero-section', [HeroSectionController::class, 'index'])->name('admin.hero-section');
    Route::get('/kurikulum-section', [KurikulumSectionController::class, 'index'])->name('admin.kurikulum-section');
    Route::get('/news-approval', [NewsApprovalController::class, 'index'])->name('admin.news-approval');
    Route::get('/news-section', [NewsSectionController::class, 'index'])->name('admin.news-section');
});
