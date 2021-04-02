<?php

//importações
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\CadastroController;

//rotas
//Route::get('/Cadastro', [cadastroController::class, 'index']);  //nova tela de login, não foi implementada
Route::put('/Despesa/{id}', [despesaController::class, 'update']);
//Route::put tem que ficar por cima do resource pois a rota padrão do laravel nao está funcionando
Route::resource('Despesa', DespesaController::class);
Route::resource('/', HomeController::class);
Route::get('/dashboard', [CadastroController::class, 'register']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('Site/Home/index');
})->name('On Fly');
