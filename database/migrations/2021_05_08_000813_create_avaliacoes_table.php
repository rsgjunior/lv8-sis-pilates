<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->float('peso')->nullable();
            $table->float('altura')->nullable();
            $table->string('atividade_fisica', 50)->nullable();
            $table->string('objetivo', 500)->nullable();
            $table->string('conhece_ou_praticou', 10);
            $table->string('medicamentos', 500)->nullable();
            $table->string('queixa_principal', 500)->nullable();
            $table->string('historia_medica_atual', 500)->nullable();
            $table->string('historia_medica_passada', 500)->nullable();
            $table->string('fatores_que_melhoram', 500)->nullable();
            $table->string('fatores_que_pioram', 500)->nullable();
            $table->string('observacao', 500)->nullable();
            $table->string('exames_complementares', 500)->nullable();
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
        Schema::dropIfExists('avaliacoes');
    }
}
