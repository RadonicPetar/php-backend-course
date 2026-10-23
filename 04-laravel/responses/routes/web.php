<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ResponseDemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/response/simple',[ResponseDemoController::class,'simple']);
Route::get('/response/headers',[ResponseDemoController::class,'headers']);
Route::get('/response/proizvodi',[ResponseDemoController::class,'products']);
Route::get('/response/json',[ResponseDemoController::class,'json']);

Route::get('/response/download',[ResponseDemoController::class,'downloadPage'])->name('download.page');
Route::get('/response/download/file',[ResponseDemoController::class,'downloadFile'])->name('download.file');
Route::get('/response/redirect',[ResponseDemoController::class,'redirectDemo']);

Route::get('/books/create',[BookController::class,'create'])->name('books.create');
Route::post('/books/create',[BookController::class,'store'])->name('books.store');
Route::get('/books',[BookController::class,'index'])->name('books.index');