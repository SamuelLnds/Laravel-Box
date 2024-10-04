<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Routes auth
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes boxes
    Route::get('/storage', [BoxController::class, 'index'])->name('storage_boxes.index');
    Route::get('/storage/{id}/show', [BoxController::class, 'show'])->name('storage_boxes.show');
    Route::put('/storage/{id}', [BoxController::class, 'update'])->name('storage_boxes.update');
    Route::delete('/storage/{id}', [BoxController::class, 'destroy'])->name('storage_boxes.destroy');
    Route::get('/storage/create', [BoxController::class, 'create'])->name('storage_boxes.create');
    Route::post('/storage', [BoxController::class, 'store'])->name('storage_boxes.store');

    // Routes tenants
    Route::get('/tenant', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('/tenant/{id}/show', [TenantController::class, 'show'])->name('tenants.show');
    Route::put('/tenant/{id}', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('/tenant/{id}', [TenantController::class, 'destroy'])->name('tenants.destroy');
    Route::get('/tenant/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::post('/tenant', [TenantController::class, 'store'])->name('tenants.store');
});

require __DIR__.'/auth.php';
