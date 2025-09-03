<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller // A classe MainController herdará as funções da classe Controller
{
    public function index($value)
    {
        return view('main', ['value' => $value]); // Retorna o conteúdo da view do arquivo main na pasta View
    }

    public function page2($value)
    {
        return view('page2', ['value' => $value]); // Retorna o conteúdo da view do arquivo main na pasta View
    }

    public function page3($value)
    {
        return view('page3', ['value' => $value]); // Retorna o conteúdo da view do arquivo main na pasta View
    }
}
