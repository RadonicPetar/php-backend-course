<?php

use App\Http\Controllers\OsobaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestDemoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/request-basic',[RequestDemoController::class,'basic']);
Route::get('/student/{id}',[RequestDemoController::class,'student'])->whereNumber('id');

Route::get('/request-ip',[RequestDemoController::class,'middlewareDemo'])->middleware('client.ip');
Route::get('/request-headers',[RequestDemoController::class,'headers']);

Route::get('/contact',[RequestDemoController::class,'showContact']);
Route::post('/contact',[RequestDemoController::class,'saveContact']);

Route::post('/calculate-age',[RequestDemoController::class,'age'])->middleware('birthdate');

Route::get('/osobe/create',[OsobaController::class,'create'])->name('osoba.create');
Route::post('/osobe/store',[OsobaController::class,'store'])->name('osoba.store');

Route::get('/osobe/prikaz',[OsobaController::class,'prikazOsoba'])->name('osobe.prikaz');


