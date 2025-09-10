<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Podemos acessar estas rotas pelo 127.0.0.1:8000 ou pelo notes.test/nome do arquivo que queremos acessar

// Rota de acesso para a view de login e usará a função login do AuthController
Route::get('/login', [AuthController::class, 'login']);

// Enviar os dados do formulario para autenticação do usuário
Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);

// Rota de acesso para a view de logout e usará a função logout do AuthController
Route::get('/logout', [AuthController::class, 'logout']);
