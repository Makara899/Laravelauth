<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $nav = ['Dashboard', 'Posts', 'Users', 'Category', 'Report' , 'Settings'];
    return view('dashboard', compact('nav'));
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {

    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/reports', function() { return "Reports Page"; })->name('reports');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
