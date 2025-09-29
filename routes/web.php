<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RezervacijaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JeloController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PDFController;

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

Route::get('/',[JeloController::class,'index'])->name('home');

Auth::routes();

Route::get('/home', [JeloController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {});

//ruta koja otvara admin panel
Route::resource('admin',AdminController::class);
Route::get('/admin_jelo',[JeloController::class,'admin'])->name('admin.jelo');

//rute za menadzerske akcije, pregled narudzbi, detalji o narudzbi, izmena narudzbi i brisanje narudzbi
Route::get('/manager',[RezervacijaController::class,'manager'])->name('manager.index');
Route::get('manager/{id}/edit',[RezervacijaController::class,'managerEdit'])->name('manager.edit');
Route::put('manager/{id}/update',[RezervacijaController::class,'managerUpdate'])->name('manager.update');


Route::post('/korpa/dodaj/{id}', [RezervacijaController::class, 'dodaj'])->name('korpa.dodaj');
Route::get('/korpa', [RezervacijaController::class, 'prikazi'])->name('korpa.prikazi');
Route::post('/korpa/izvrsi', [RezervacijaController::class, 'izvrsi'])->name('korpa.izvrsi');
Route::post('/korpa/obrisi/{id}',[RezervacijaController::class, 'obrisi'])->name('korpa.obrisi');
Route::post('/korpa/isprazni', [RezervacijaController::class, 'isprazni'])->name('korpa.isprazni');

Route::post('/korpa/izmeni-kolicinu/{id}', [RezervacijaController::class, 'izmeniKolicinu'])->name('korpa.izmeniKolicinu');

Route::resource('jelos', App\Http\Controllers\JeloController::class);

Route::resource('roles', App\Http\Controllers\RoleController::class);

Route::resource('statuses', App\Http\Controllers\StatusController::class);

Route::resource('users', App\Http\Controllers\UserController::class)->except('create', 'store', 'show');

Route::resource('rezervacijas', App\Http\Controllers\RezervacijaController::class);

Route::get('pdf/orders', [PDFController::class, 'generatePDF'])->name('pdf.orders');
