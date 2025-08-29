<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller // A classe MainController herdará as funções da classe Controller
{
    public function index()
    {
        return view('main'); // Retorna o conteúdo da view do arquivo main na pasta View
    }
}
