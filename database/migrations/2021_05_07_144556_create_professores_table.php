<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('email', 120);
            $table->date('data_nascimento');
            $table->tinyInteger('profissao');  //(1 = Fisioterapeuta / 2 = Terapeuta Ocupacional / 3 = Educador Físico)
            $table->string('registro_profissional');
            $table->string('sexo', 20);
            $table->string('telefone', 25);
            $table->string('telefone2', 25)->nullable();
            $table->string('cep', 8);
            $table->string('endereco_rua', 50);
            $table->string('endereco_numero', 10);
            $table->string('endereco_complemento', 50)->nullable();
            $table->string('endereco_estado', 50);
            $table->string('endereco_cidade', 50);
            $table->string('endereco_bairro', 50);
            $table->string('cpf', 11);
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
        Schema::dropIfExists('professores');
    }
}
