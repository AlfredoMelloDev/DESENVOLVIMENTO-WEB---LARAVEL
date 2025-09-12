<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;      // DB é uma Facade que encapsula a funcionalidade de banco de dados do Laravel e quenos permite o uso dos seus comandos

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
        //  Validação que será usada nos campos do formulário, criamos um array
        $request->validate(
            [
                // Campos que eu quero que sejam verificados, os tipos do valores permitidos e tamanhos
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],

            // Campos de Erros caso não passem na validaçãos dos dados nos campos
            [
                // Mensagem de erro para o campo de usuário
                'text_username.required' => 'O Usuário é obrigatório',
                'text_username.email' => 'Usuário deve ser um email válido',

                // Usamos min e max para tamanhos necessarios da inserção
                'text_password.required' => 'Senha Obrigatória',
                'text_password.min' => 'A senha deve ter no mínimo 6 dígitos',
                'text_password.max' => 'A senha deve ter no máximo 16 dígitos'
            ]
        );

        // E se passaram pela validação os dados serão capturados e salvos nas variaveis .
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        // Depois da criação do banco de dados, iremos validar a conexão verificando se os dados foram enviados

        try{
            // método que irá fazer a conexão com o DB
            DB::connection()->getPdo();
            echo 'Conexão foi estabelecida !';
        }catch(\PDOException $e) {
            echo "Conexão Falhou : " . $e->getMessage();
        }

        // Usamos este $request->input("name do input") para ver o valor que foi inserido neste campo .
        // echo $request->input("text_username");
        // echo "<br>";
        // echo $request->input("text_password");

        echo 'Conexão foi um sucesso ! Fim ';
    }

    public function logout()
    {
        echo 'logout';
    }
}
