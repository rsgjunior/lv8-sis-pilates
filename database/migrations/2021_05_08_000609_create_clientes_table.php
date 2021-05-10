<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('email', 120)->nullable();
            $table->date('data_nascimento');
            $table->string('profissao', 45)->nullable();
            $table->string('sexo', 20)->nullable();
            $table->string('telefone', 25);
            $table->string('telefone2', 25)->nullable();
            $table->string('cep', 8)->nullable();
            $table->string('endereco_rua', 50)->nullable();
            $table->string('endereco_numero', 10)->nullable();
            $table->string('endereco_complemento', 50)->nullable();
            $table->string('endereco_estado', 50)->nullable();
            $table->string('endereco_cidade', 50)->nullable();
            $table->string('endereco_bairro', 50)->nullable();
            $table->string('rg', 14)->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
