<?php

//importações
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\despesaController;
use App\Http\Controllers\cadastroController;

//rotas
Route::get('/', [homeController::class, 'index']);
//Route::get('/Cadastro', [cadastroController::class, 'index']);  nova tela de login, não foi implementada
Route::get('/Despesa/showAll', [despesaController::class, 'index'])->middleware('auth');
Route::get('/Despesa/new', [despesaController::class, 'create'])->middleware('auth');
Route::get('/Despesa/{id}', [despesaController::class, 'show'])->middleware('auth');
Route::delete('/Despesa/{id}', [despesaController::class, 'destroy'])->middleware('auth');
Route::get('/Despesa/edit/{id}', [despesaController::class, 'edit'])->middleware('auth');
Route::put('/Despesa/update/{id}', [despesaController::class, 'update'])->middleware('auth');
Route::post('/Despesa', [despesaController::class, 'store'])->middleware('auth');
Route::get('/dashboard', [cadastroController::class, 'register']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('Site/Home/index');
})->name('On Fly');
