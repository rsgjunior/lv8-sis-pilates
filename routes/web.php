<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ExperimentalController;
use App\Http\Controllers\HorarioTurmaController;
use App\Http\Controllers\ObservacaoController;
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

Route::get('/home', function () {
    return redirect('/dashboard');
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Página Inicial
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rotas Alunos
    Route::resource('/alunos', AlunoController::class);

    // Rotas Professores
    Route::post('/professores/alocar', [ProfessorController::class, 'alocarProfessor'])->name('professores.alocar');
    Route::post('/professores/desalocar/{turma_id}', [ProfessorController::class, 'desalocarProfessor'])->name('professores.desalocar');    
    Route::resource('/professores', ProfessorController::class)->parameters([
        'professores' => 'professor'
    ]);

    // Rotas Turmas
    Route::post('/turmas/matricular', [TurmaController::class, 'matricular'])->name('turmas.matricular');
    Route::post('/turmas/desmatricular/{turma_id}/{aluno_id}', [TurmaController::class, 'desmatricular'])
        ->name('turmas.desmatricular');
    Route::resource('/turmas', TurmaController::class)->except(['create']);
    
    // Rotas Horários
    Route::post('/horarios', [HorarioTurmaController::class, 'store'])->name('horarios.store');
    Route::delete('/horarios/{horario_id}', [HorarioTurmaController::class, 'destroy'])->name('horarios.destroy');
    
    // Rotas Avaliações
    Route::get('/avaliacoes/create/{aluno_id}', [AvaliacaoController::class, 'create'])->name('avaliacoes.create');
    Route::resource('/avaliacoes', AvaliacaoController::class)->except(['index', 'create'])->parameters([
        'avaliacoes' => 'avaliacao'
    ]);

    // Rotas Calendário
    Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario.index');

    // Rotas Observações
    Route::get('/observacoes/create/{aluno_id}', [ObservacaoController::class, 'create'])->name('observacoes.create');
    Route::resource('/observacoes', ObservacaoController::class)->except(['index', 'create'])->parameters([
        'observacoes' => 'observacao'
    ]);

    // Rotas Experimentais
    Route::resource('/experimentais', ExperimentalController::class)->parameters([
        'experimentais' => 'experimental'
    ]);
});



require __DIR__.'/auth.php';
