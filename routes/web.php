<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmaController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});



Route::group(['middleware' => 'auth'], function () {
    // Página Inicial
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rotas Alunos
    Route::resource('/alunos', AlunoController::class);

    // Rotas Professores
    Route::resource('/professores', ProfessorController::class)->parameters([
        'professores' => 'professor'
    ]);    

    // Rotas Turmas
    Route::resource('/turmas', TurmaController::class)->except(['create']);
    Route::post('/turmas/matricular', [TurmaController::class, 'matricular'])->name('turmas.matricular');
    Route::post('/turmas/desmatricular/{turma_id}/{aluno_id}', [TurmaController::class, 'desmatricular'])
                ->name('turmas.desmatricular');

    // Rotas Horários
    Route::post('/horarios', [HorarioController::class, 'store'])->name('horarios.store');
    Route::delete('/horarios/{horario_id}', [HorarioController::class, 'destroy'])->name('horarios.destroy');
    
    // Rotas Avaliações
    Route::resource('/avaliacoes', AvaliacaoController::class)->except(['index', 'create'])->parameters([
        'avaliacoes' => 'avaliacao'
    ]);
    Route::get('/avaliacoes/create/{aluno_id}', [AvaliacaoController::class, 'create'])->name('avaliacoes.create');

    // Rotas Calendário
    Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario.index');
});



require __DIR__.'/auth.php';
