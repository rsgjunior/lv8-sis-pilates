<?php

use App\Http\Controllers\ClienteController;
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/clientes', ClienteController::class);
    Route::resource('/turmas', TurmaController::class);
    Route::post('/turmas/matricular', [TurmaController::class, 'matricular'])->name('turmas.matricular');
    Route::post('/turmas/desmatricular/{turma_id}/{cliente_id}', [TurmaController::class, 'desmatricular'])->name('turmas.desmatricular');
});



require __DIR__.'/auth.php';
