<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        // Queremos checar para ver se o usuário e senha existem, usaremos a validação da coluna delete_at e
        // Iniciamos com o nome do model e usamos suas propriedades( colunas )
        $user = User::where('username', $username)                              // Denominamos que a variavel terá o valor desta coluna
            ->where('deleted_at', NULL)                         // A valor da coluna delete_at tem que ser NULL
            ->first();                                          // E retornar o primeiro resultado


        // Verificações dos campos do formulário
        // Caso a variavel não retorne dados
        if (!$user) {
            return redirect()                                                   // Irá ser redirecionada
                ->back()                                                    // Irá retornar uma ação
                ->withInput()                                               // Com dados dos campos que foram inseridos corretamente
                ->with('loginError', 'Username ou Password incorretos ');   // E irá apresentar uma mensagem flash na sessão com a mensagem com o erro
        }

        // Caso a função password_verify veja que a senha inserida não bate com a senha cadastrada
        if (!password_verify($password, $user->password)) {
            return redirect()
                ->back()
                ->withInput()
                ->with("loginError", 'Username ou Password incorretos');
        }

        // Caso passe nas validações irá além de registrar nome e senha, irá registrar
        $user->last_login = date('Y:m:d H:i:s');

        // usaremos a função do Laravel Save
        $user->save();

        // Dados do usuário do login da sessão
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
            ]);

        echo '<h2>Login efetuado com sucesso</h2> ';

        // Também podemos chamar por este formato, como uma instancia de um objeto .
        // Instaniaremos o model em uma variavel e depois retornaremos os dados em um array
        // $usuariosModel = new User();
        // $user = $usuariosModel->all()->toArray();

        // echo '<pre>';
        // print_r($user);

        // Depois da criação do banco de dados, iremos validação de conexão com o banco de dados
        // try{
        //     método que irá fazer a conexão com o DB
        //     DB::connection()->getPdo();
        //     echo 'Conexão foi estabelecida !';
        // }catch(\PDOException $e) {
        //     echo "Conexão Falhou : " . $e->getMessage();
        // }

        // Usamos este $request->input("name do input") para ver o valor que foi inserido neste campo .
        // echo $request->input("text_username");
        // echo "<br>";
        // echo $request->input("text_password");
    }

    public function logout()
    {
        echo 'logout';
    }
}
