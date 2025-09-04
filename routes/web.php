<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


// Podemos acessar estas rotas pelo 127.0.0.1:8000 ou pelo notes.test/nome do arquivo que queremos acessar

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    echo "About Me, Alfredo Mello";
});

Route::get('/main/{value}', [MainController::class, 'index']); // Irá acessar a rota no url main e acessar a função index

Route::get('/page2/{value}', [MainController::class, 'page2']); // comando para criar estas páginas : php artisan make:view page2

Route::get('/page3/{value}', [MainController::class, 'page3']); // comando para criar estas páginas : php artisan make:view page3
