<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    // Função loginSubmit na rota para o post
    // Quando se é enviado dados como um formulário, modal, etc utilizamos o Request cifrão request
    public function loginSubmit(Request $request)
    {
        // Validação que será usada nos campos do formulário, criamos um array
        $request->validate(
            [
                // Campos que eu quero que sejam verificados
                'text_username' => 'required',
                'text_password' => 'required'
            ]
        );

        // Capturamos os dados enviados pelos inputs
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        // Usamos este $request->input("name do input") para ver o valor que foi inserido neste campo .
        // echo $request->input("text_username");
        // echo "<br>";
        // echo $request->input("text_password");

        echo 'Foi validado';
    }

    public function logout()
    {
        echo 'logout';
    }
}
