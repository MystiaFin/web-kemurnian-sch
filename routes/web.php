<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\KurikulumSectionController;
use App\Http\Controllers\Admin\NewKurikulumController;
use App\Http\Controllers\Admin\NewsApprovalController;
use App\Http\Controllers\Admin\NewsSectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return view('about');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/hero-section', [HeroSectionController::class, 'index'])->name('admin.hero-section');

    Route::get('/kurikulum-section', [KurikulumSectionController::class, 'index'])->name('admin.kurikulum-section');
    Route::get('/new-kurikulum', [NewKurikulumController::class, 'index'])->name('admin.new-kurikulum');
    Route::post('/new-kurikulum', [NewKurikulumController::class, 'store'])->name('admin.new-kurikulum-store');

    Route::get('/kurikulum/{id}/edit', [KurikulumSectionController::class, 'edit'])->name('admin.edit-kurikulum');
    Route::put('/kurikulum/{id}', [KurikulumSectionController::class, 'update'])->name('admin.kurikulum.update');
    Route::delete('/kurikulum/{id}', [KurikulumSectionController::class, 'destroy'])->name('admin.kurikulum.destroy');

    Route::get('/news-approval', [NewsApprovalController::class, 'index'])->name('admin.news-approval');
    Route::get('/news-section', [NewsSectionController::class, 'index'])->name('admin.news-section');
});
