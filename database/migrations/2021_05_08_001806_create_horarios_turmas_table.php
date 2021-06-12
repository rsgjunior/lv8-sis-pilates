<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_turmas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turma_id')->constrained('turmas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->tinyInteger('dia_da_semana');
            $table->time('horario_inicio');
            $table->time('horario_fim');
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
        Schema::dropIfExists('horarios_turmas');
    }
}
