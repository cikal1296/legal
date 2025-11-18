<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/case', function () {
    return view('case');
});

Route::get('/deadline', function () {
    return view('deadline');
});
Route::get('/jurnal', function () {
    return view('jurnal');
});

Route::get('/test', function () {
    return view('testt');
});
Route::get('/anjas', function () {
    return view('component');
});
Route::get('/oper', function () {
    return view('operview');
});
Route::get('/help', function () {
    return view('help');
});
Route::get('/calendar', function () {
    return view('calendar');
});

Route::get('/employee', function () {
    return view('main');
});
Route::get('/statistik', function () {
    return view('statistik');
});

 Route::middleware(['auth','verified'])->group(function () {

 Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
Route::post('/post/create', [PostController::class,'store'])->name('post.store');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
