<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        // Cria a tabela "users" no banco de dados
        Schema::create('users', function (Blueprint $table) {

            // Cria a coluna "id" do tipo BIGINT, chave primária e autoincrementável
            $table->id()->autoIncrement();

            // Cria a coluna "username" como string (VARCHAR) de até 50 caracteres
            // O campo pode ser NULL porque foi definido ->nullable()
            $table->string('username', 50)->nullable();

            // Cria a coluna "password" como string (VARCHAR) de até 200 caracteres
            // Também permite NULL. (200 caracteres é útil para armazenar hash de senha)
            $table->string('password', 200)->nullable();

            // Cria a coluna "last_login" do tipo DATETIME
            // Também pode ser NULL (caso o usuário nunca tenha feito login ainda)
            $table->dateTime('last_login')->nullable();

            // Cria automaticamente duas colunas: "created_at" e "updated_at"
            // São DATETIME, Laravel preenche e atualiza sozinho
            $table->timestamps();

            // Cria a coluna "deleted_at" do tipo DATETIME
            // Serve para Soft Deletes (em vez de apagar, marca a data de exclusão lógica)
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
