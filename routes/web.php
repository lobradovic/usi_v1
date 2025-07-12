<?php

use App\Http\Controllers\RezervacijaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {});


Route::resource('jelos', App\Http\Controllers\JeloController::class);

Route::post('/korpa/dodaj/{id}', [RezervacijaController::class, 'dodaj'])->name('korpa.dodaj');
Route::get('/korpa', [RezervacijaController::class, 'prikazi'])->name('korpa.prikazi');
Route::post('/korpa/izvrsi', [RezervacijaController::class, 'izvrsi'])->name('korpa.izvrsi');
Route::post('/korpa/obrisi/{id}', [RezervacijaController::class, 'obrisi'])->name('korpa.obrisi');
