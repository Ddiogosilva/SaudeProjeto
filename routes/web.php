<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoricotbController;
use App\Http\Controllers\webController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



route::get('/',[webController::class,'index'])->name('index');
 
Route::get('/Cadastro',[webController::class,'showFormCadastro'])->name('formulario-cadastro');
 
Route::get('/historicotodos',[HistoricotbController::class,'showGerenciador'])->name('historico-todos');
 
Route::post('/historicoadd',[HistoricotbController::class,'storeHistorico'])->name('cadastrar-dados');
 
Route::delete('/delete-historico/{id}',[HistoricotbController::class,'destroy'])->name('delete-historico');
 
Route::get('/historico/{id}',[HistoricotbController::class,'show'])->name('alterar-historico');
Route::put('/historicoBanco/{id}',[HistoricotbController::class,'update'])->name('alterarBanco-hitorico');
 
 
// tela em tela
 
Route::get('/colesterol',[webController::class,'showFormCoslesterol'])->name('colesterol-form');
 
Route::get('/glicose',[webController::class,'showFormGlicose'])->name('glicose-form');
 
Route::get('/pressao',[webController::class,'showFormPressao'])->name('pressao-form');
 
Route::get('/suporte',[webController::class,'showFormSuporte'])->name('suporte-form');
 
Route::get('/duvidas',[webController::class,'showFormDuvidas'])->name('duvidas-form');

Route::post('/contato',[webController::class,'enviaContato'])->name('envia-Contato');

