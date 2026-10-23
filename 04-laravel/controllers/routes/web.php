<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\VozilaController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello',[HelloController::class,'index']);
Route::get('/students/{id}',[StudentController::class,'show'])->whereNumber('id');
Route::get('/controller-list',[ListController::class,'list']);
Route::get('/cities',[CityController::class,'index']);

Route::get('/controller-admin',[AdminController::class,'dashboard'])->middleware('admin');
Route::get('/controller-admin-header',[AdminController::class,'dashboard'])->middleware('admin','course.header');

Route::prefix('controller-admin-panel')
    ->middleware(['admin','course.header'])
    ->group(function(){
            Route::get('/dashboard',[AdminController::class,'dashboard']);
            Route::get('/users',[AdminController::class,'users']);
    });

Route::get('/controller-categories',[CategoryController::class,'index'])->middleware('check.categories');
Route::get('/controller-categories-json',[CategoryController::class,'json'])->middleware('check.categories');

Route::get('/controller-products',[ProductController::class,'index'])->middleware('check.products');

Route::get('/controller-request-info',[ReportController::class,'requestInfo']);

Route::get('/vozila',[VozilaController::class,'index'])->middleware('check.vozila');
Route::get('/vozila/broj-po-vlasniku',[VozilaController::class,'brojAutomobilaPoVlasniku'])->middleware('check.vozila');
Route::get('/vozila/pdf',[VozilaController::class,'exportToPdf'])->middleware('check.vozila');