<?php

use App\Http\Controllers\AuthDemoController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/testdashboard',function (){
    return view('test');
})->middleware(['auth', 'verified'])->name('testdashboard');

Route::get('/secret', function(){
    return 'Tajna stranica';
})->middleware('auth');

Route::get('/profile-demo',[AuthDemoController::class,'profile'])->middleware('auth')->name('profile.demo');
Route::get('/admin-demo',[AuthDemoController::class,'admin'])->middleware('auth')->name('admin.demo');


Route::get('/notes',[NoteController::class,'index'])->middleware('auth')->name('notes.index');
Route::get('/notes/{note}',[NoteController::class,'show'])->middleware('auth')->name('notes.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
