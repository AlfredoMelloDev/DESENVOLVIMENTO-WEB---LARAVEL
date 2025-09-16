<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Responsável por executar comandos SQL no banco de dados, no caso a baixo irá inserir
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Faremos a comunicação com a base de dados e inserção destes dados em uma tabela especifica
        // Enviaremos os dados dentro de um array
        DB::table('users')->insert([

            // Criará o 1° usuário
            [
                'username' => 'usuario1@gmail.com',
                // No password usaremos o bcrypt do Laravel para transformar a senha em um algo encriptado
                'password' => bcrypt('abc123456'),
                // Data e horario em que foi criado este usuário
                'created_at' => date('Y:m:d H:i:s')
            ],

            // Criará um 2° usuário
            [
                'username' => 'usuario2@gmail.com',
                // No password usaremos o bcrypt do Laravel para transformar a senha em um algo encriptado
                'password' => bcrypt('abc123456'),
                // Data e horario em que foi criado este usuário
                'created_at' => date('Y:m:d H:i:s')
            ],
            
            // Criará um 3° usuário
            [
                'username' => 'usuario3@gmail.com',
                // No password usaremos o bcrypt do Laravel para transformar a senha em um algo encriptado
                'password' => bcrypt('abc123456'),
                // Data e horario em que foi criado este usuário
                'created_at' => date('Y:m:d H:i:s')
            ]
        ]);
    }
}
