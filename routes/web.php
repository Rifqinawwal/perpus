<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('books', BookController::class);

Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/recommendations', [BookController::class, 'recommendations'])->name('books.recommendations');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

require __DIR__.'/auth.php';
