<?php

//Oganizando os controllers
use App\Http\Controllers\{
    CursoController,
    PainelController,
    AlunoController,
    RelatorioController
};

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

// Route::get('/', function () {
//     return view('welcome');
// });

/**
 * Rotas para o recurso "painel"
 */

Route::get('/', [PainelController::class, 'index'])->name('painel.index');

/**
 * Rotas para o recurso "curso"
 */
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
Route::get('/cursos/{id}', [CursoController::class, 'show'])->name('cursos.show');
Route::get('/cursos/edit/{id}', [CursoController::class, 'edit'])->name('cursos.edit');
Route::put('/cursos/{id}', [CursoController::class, 'update'])->name('cursos.update');
Route::delete('/cursos/destroy/{id}', [CursoController::class, 'destroy'])->name('cursos.destroy');

/**
 * Rotas para o recurso "aluno"
 */
Route::get('/alunos', [alunoController::class, 'index'])->name('alunos.index');
Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');
Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');
Route::get('/alunos/{id}', [AlunoController::class, 'show'])->name('alunos.show');
Route::get('/alunos/edit/{id}', [AlunoController::class, 'edit'])->name('alunos.edit');
Route::put('/alunos/{id}', [AlunoController::class, 'update'])->name('alunos.update');
Route::delete('/alunos/destroy/{id}', [AlunoController::class, 'destroy'])->name('alunos.destroy');

/**
 * Rotas para o recurso "relatórios"
 */
Route::get('/relatorio', [RelatorioController::class, 'index'])->name('relatorios.index');
Route::get('/relatorio/curso/10+', [RelatorioController::class, 'cursoAcimaDez'])->name('relatorios.curso.acimadez');

/**
 * Rotas para o recurso "autenticação"
 */
Route::get('/logout', function(){
    return view('login');
});