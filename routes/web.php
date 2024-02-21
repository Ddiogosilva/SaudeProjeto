<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastrotbController;
use App\Http\Controllers\HistoricotbController;
use App\Http\Controllers\webController;

// --rotas cadastroController


route::get('/',[webController::class,'index'])->name('index');

Route::get('/Cadastro',[CadastrotbController::class,'showFormCadastro'])->name('formulario-cadastro');

Route::post('/Cadastro',[CadastrotbController::class,'storecadastro'])->name('cadastrar-user');

Route::get('/Editar/{id}',[CadastrotbController::class,'show'])->name('Editar-cadastro');
Route::put('/EditarCadastro/{id}',[CadastrotbController::class,'update'])->name('EditarBanco-alterar');


// -- rotas loginController






// -- rotas historicoController

Route::get('/historicotodos',[HistoricotbController::class,'showGerenciador'])->name('historico-todos');

Route::post('/historicoadd',[HistoricotbController::class,'storeHistorico'])->name('cadastrar-dados');

Route::delete('/delete-historico/{id}',[HistoricotbController::class,'destroy'])->name('delete-historico');

Route::get('/historico/{id}',[HistoricotbController::class,'show'])->name('alterar-historico');
Route::put('/historicoBanco/{id}',[HistoricotbController::class,'update'])->name('alterarBanco-hitorico');


// tela em tela

Route::get('/colesterol',[webController::class,'showFormCoslesterol'])->name('colesterol-form'); 

Route::get('/glicemia',[webController::class,'showFormGlicemia'])->name('glicemia-form');

Route::get('/pressao',[webController::class,'showFormPressao'])->name('pressao-form');

Route::get('/suporte',[webController::class,'showFormSuporte'])->name('suporte-form');

Route::get('/duvidas',[webController::class,'showFormDuvidas'])->name('duvidas-form');