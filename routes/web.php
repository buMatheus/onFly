<?php

//importações
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DespesaController;

//rotas
Route::put('/Despesa/{id}', [despesaController::class, 'update']);
//Route::put tem que ficar por cima do resource pois a rota padrão do laravel nao está funcionando
Route::resource('Despesa', DespesaController::class);
Route::resource('/', HomeController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('Site/Home/index');
})->name('On Fly');
