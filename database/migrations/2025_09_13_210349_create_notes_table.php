<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

// Usamos esta facade para acessar métodos estáticos relacionados a criação, alteração e exclusão de tabelas no banco de dados
// O exemplo que será usado neste arquivo é para a criação da estrutura
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    // Migrations servem para estruturar a table( Neste caso notes) e ao rodar irá criar esta estrutura na table do banco de dados
    public function up(): void
    {
        // Aqui acontece a criação do schema(criar table) e inplmentar com esta estrutura
        Schema::create('notes', function (Blueprint $table) {

            // Temos a variável onde iremos guardar os dados e estas variáveis irão receber o tipo de variável e o conteudo, tendo a opção de também ser nula.
            $table->id()->autoIncrement();              // A cada nota vai gerando um id
            $table->integer('user_id')->nullable();     // id do usuário
            $table->string('title', 200)->nullable();   // titulo da nota
            $table->string('text', 3000)->nullable();   // texto que será inserido na nota

            // Estes servirão para registrar a hora que foram criadas e a hora que foram excluidas( Mas a exclusão é somente no visual pois ainda mantém registro dos dados e conteúdos)
            $table->timestamps();
            $table->softDeletes();
        });

        // E damos o comando php artisan migrate para rodar
    }

    // caso precisarmos voltar um passo atrás usamos o comando php artisan migrate:rollback
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
