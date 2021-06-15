<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\JogadorController;
use App\Http\Controllers\PresencaController;
use App\Http\Controllers\SorteioController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/usuarios', UsuarioController::class);
Route::resource('/jogador', JogadorController::class);
Route::resource('/presenca', PresencaController::class);
Route::post('/presenca/pesquisar',[PresencaController::class, 'pesquisar'])->name('pesquisar');
Route::get('/sorteioJogo/{id}', [SorteioController::class, 'sorteioJogo'])->name('sorteioJogo');
Route::get('/sorteio', [SorteioController::class, 'index'])->name('sorteio');
Route::post('/sorteio/times', [SorteioController::class, 'sorteioTimes'])->name('sorteioTimes');
Route::post('/sorteando', [SorteioController::class, 'sorteando'])->name('sorteando');
