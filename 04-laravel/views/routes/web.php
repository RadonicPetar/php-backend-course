<?php

use App\Http\Controllers\LayoutDemoController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layoutdemo.home');
});

Route::get('/student',[ViewController::class,'show']);
Route::get('/student/status',[ViewController::class,'status']);
Route::get('/student/status/advanced',[ViewController::class,'statusAdvanced']);
Route::get('/books-empty',[ViewController::class,'booksEmpty']);
Route::get('/books',[ViewController::class,'books']);
Route::get('/products',[ViewController::class,'products']);


Route::get('/layout/home',[LayoutDemoController::class,'home'])->name('layout.home');
Route::get('/layout/about',[LayoutDemoController::class,'about'])->name('layout.about');
Route::get('/layout/car',[LayoutDemoController::class,'car'])->name('layout.car');
Route::get('/layout/book/create',[LayoutDemoController::class,'createBook'])->name('layout.book.create');
Route::post('/layout/book/store',[LayoutDemoController::class,'storeBook'])->name('layout.book.store');

Route::get('/layout/alerts',[LayoutDemoController::class,'alertDemo'])->name('layout.alerts');
Route::get('/layout/cards',[LayoutDemoController::class,'cardDemo'])->name('layout.cards');
Route::get('/layout/tecajevi',[LayoutDemoController::class,'tecajeviDemo'])->name('layout.tecajevi');

Route::get('/layout/stacks',[LayoutDemoController::class,'stackDemo'])->name('layout.stacks');
Route::get('/layout/js',[LayoutDemoController::class,'stackJS'])->name('layout.stacks.js');

Route::get('/layout/parent',[LayoutDemoController::class,'parentDemo'])->name('layout.parent');
Route::get('/layout/products-table',[LayoutDemoController::class,'productsTable'])->name('layout.products.table');
Route::get('/layout/vehicles-table',[LayoutDemoController::class,'vehiclesTable'])->name('layout.vehicles.table');
Route::get('/layout/categories-table',[LayoutDemoController::class,'categoriesTable'])->name('layout.categories.table');

