<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
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
        $rows = $this->cursos->latest()->paginate(10);

        //Renderizando a view
        return view('admin.cursos.index', compact('rows'));
    }

    public function create()
    {
        //Retorna a view do formulário
        return view('admin.cursos.create');
    }

    public function store(CursoRequest $request)
    {
        //Recebe todos os inputs do formulário
        $input = $request->all();

        //Realiza o registro no banco de dados e atribui a variável os dados registrado no banco
        $curso = $this->cursos->create($input);

        //Retorna para a lista de cursos
        return redirect()
            ->route('cursos.index')
            ->with('message', 'Curso criado com sucesso!');
    }

    public function show($id)
    {
        $row = $this->cursos->find($id);

        if(!$row) return redirect()->route('cursos.index');

        return view('admin.cursos.show', compact('row'));
    }

    public function edit($id)
    {
        $row = $this->cursos->find($id);

        if(!$row) return redirect()->route('cursos.index');

        return view('admin.cursos.edit', compact('row'));
    }

    public function update($id, CursoRequest $request)
    {
        $row = $this->cursos->find($id);

        $input = $request->all();

        if(!$row) return redirect()->back();

        $row->update($input);

        return redirect()
            ->route('cursos.index')
            ->with('message', 'Curso atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $row = $this->cursos->find($id);

        if(!$row){
            return redirect()->route('cursos.index');
        } 

        $row->delete();

        return redirect()
            ->route('cursos.index')
            ->with('message', 'Curso removido com sucesso!');
    }
}
