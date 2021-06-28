<?php

namespace App\Http\Controllers;

use App\Models\curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    
    private $cursos;

    public function __construct(Curso $cursos)
    {
        //Recebendo a classe o modelo curso
        $this->cursos = $cursos;
    }

    public function index()
    {
        //Selecionando todos os cursos
        $rows = $this->cursos->all();

        //Renderizando a view
        return view('admin.cursos.index', compact('rows'));
    }

    public function create()
    {
        return view('admin.cursos.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $curso = $this->cursos->create($input);

        return redirect()->route('cursos.index');
    }
}
