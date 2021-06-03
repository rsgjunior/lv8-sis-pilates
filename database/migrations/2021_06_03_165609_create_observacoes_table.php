<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->contrained('alunos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('titulo', 120);
            $table->longText('descricao');
            $table->tinyInteger('categoria');
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
        Schema::dropIfExists('observacoes');
    }
}
