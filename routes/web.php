<?php

//Oganizando os controllers
use App\Http\Controllers\{
    CursoController,
    PainelController
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
