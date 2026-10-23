<?php

use App\Http\Controllers\AutoValidacijaController;
use App\Http\Controllers\LijecnikController;
use App\Http\Controllers\OsnovnaValidacijaController;
use App\Http\Controllers\OsobaJsonValidacijaController;
use App\Http\Controllers\OsobaValidacijaController;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\ZaposlenikController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/validacija/osnovna',[OsnovnaValidacijaController::class,'create'])
    ->name('validacija.osnovna.create');

Route::post('/validacija/osnovna',[OsnovnaValidacijaController::class,'store'])
    ->name('validacija.osnovna.store');

Route::get('/validacija/osoba',[OsobaValidacijaController::class,'create'])->name('validacija.osoba.create');
Route::post('/validacija/osoba',[OsobaValidacijaController::class,'store'])->name('validacija.osoba.store');

Route::get('/validacija/osoba-json',[OsobaJsonValidacijaController::class,'create'])->name('validacija.osoba.json.create');
Route::post('/validacija/osoba-json',[OsobaJsonValidacijaController::class,'store'])->name('validacija.osoba.json.store');
Route::get('/validacija/osobe-json',[OsobaJsonValidacijaController::class,'osobeShow'])->name('validacija.osoba.json.show');


Route::get('/validacija/auto',[AutoValidacijaController::class,'create'])->name('validacija.auto.create');
Route::post('/validacija/auto',[AutoValidacijaController::class,'store'])->name('validacija.auto.store');

Route::get('/validacija/zaposlenik',[ZaposlenikController::class,'create'])->name('validacija.zaposlenik.create');
Route::post('/validacija/zaposlenik',[ZaposlenikController::class,'store'])->name('validacija.zaposlenik.store');

Route::get('/validacija/lijecnik',[LijecnikController::class,'create'])->name('validacija.lijecnik.create');
Route::post('/validacija/lijecnik',[LijecnikController::class,'store'])->name('validacija.lijecnik.store');

Route::get('/validacija/proizvod',[ProizvodController::class,'create'])->name('validacija.proizvod.create');
Route::post('/validacija/proizvod',[ProizvodController::class,'store'])->name('validacija.proizvod.store');