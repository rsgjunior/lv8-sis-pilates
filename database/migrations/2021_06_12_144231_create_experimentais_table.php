<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperimentaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experimentais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->date('data');
            $table->time('horario_inicio');
            $table->time('horario_fim');
            $table->string('observacao', 500)->nullable();
            $table->string('feedback', 500)->nullable();
            $table->tinyInteger('status')->default(0); // 0 - Marcada, 1 - Realizou, 2 - Matriculou, 3 - Não compareceu
            $table->string('cor_calendario', 7)->default('#65af56');
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
        Schema::dropIfExists('experimentais');
    }
}
