<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosAulasTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos_aulas_turmas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_turma_id')->constrained('aulas_turmas');
            $table->foreignId('aluno_id')->constrained('alunos');
            $table->tinyInteger('presente')->default(0);
            $table->text('motivo_falta')->nullable();
            $table->string('origem', 25);
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
        Schema::dropIfExists('alunos_aulas_turmas');
    }
}
