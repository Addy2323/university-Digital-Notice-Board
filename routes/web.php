<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/notices', [NoticeController::class, 'index'])->name('notices.index');
    Route::get('/notices/create', [NoticeController::class, 'create'])->name('notices.create')->middleware('role:admin');
    Route::post('/notices', [NoticeController::class, 'store'])->name('notices.store')->middleware('role:admin');
    Route::get('/notices/{notice}', [NoticeController::class, 'show'])->name('notices.show');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'role:admin']);
});

require __DIR__.'/auth.php';
