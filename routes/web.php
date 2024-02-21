<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastrotbController;
use App\Http\Controllers\HistoricotbController;

// --rotas cadastroController


route::get('/',[CadastrotbController::class,'index'])->name('index');

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
