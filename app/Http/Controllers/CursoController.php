<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        
        //Verificando o arquivo é válido como imagem
        if(isset($input['imagem']) && $request->imagem->isValid()){
            $imagem_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->imagem->getClientOriginalExtension();
            $imagem = $request->imagem->storeAs('cursos', $imagem_nome);
            $input['imagem'] = $imagem;
        }

        //Realiza o registro no banco de dados e atribui a variável os dados registrado no banco
        $curso = $this->cursos->create($input);

        //Retorna para a lista de cursos
        return redirect()
            ->route('cursos.index')
            ->with('message', 'Curso criado com sucesso!');
    }

    public function show($id)
    {
        //Consultando os regitros no banco de dados
        $row = $this->cursos->find($id);

        //Caso  não tenha registro retorna para o index
        if(!$row) return redirect()->route('cursos.index');

        //Exibe os dados do curso
        return view('admin.cursos.show', compact('row'));
    }

    public function edit($id)
    {
        //Consultando os regitros no banco de dados
        $row = $this->cursos->find($id);

        //Caso não tenha registro retorna para o index
        if(!$row) return redirect()->route('cursos.index');

        //Exibe o formulário para edição
        return view('admin.cursos.edit', compact('row'));
    }

    public function update($id, CursoRequest $request)
    {
        //Recebendo os inputs
        $input = $request->all();

        //Consultando o registro
        $row = $this->cursos->find($id);
        
        //Caso não encontre o registro o mesmo voltará para a tela anterior 
        if(!$row) return redirect()->back();

        //Verificando se o arquivo é válido como imagem
        if(isset($input['imagem']) && $request->imagem->isValid()){
            //Deletando o arquivo caso já exista algum
            if(Storage::exists($row->imagem))
                Storage::delete($row->imagem);


            $imagem_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->imagem->getClientOriginalExtension();
            $imagem = $request->imagem->storeAs('cursos', $imagem_nome);
            $input['imagem'] = $imagem;
        }

        //Realizando o processo de update
        $row->update($input);

        //Redireciona com uma mensagem de sucesso
        return redirect()
            ->route('cursos.index')
            ->with('message', 'Curso atualizado com sucesso!');
    }

    public function destroy($id)
    {
        //consulta o regitro
        $row = $this->cursos->find($id);
        
        if(count($row->alunos) > 0){
            return back()
                ->with('message', 'Este curso não pode ser excluído enquanto houver alunos matriculados.');
        }

        //Caso não encontre o mesmo será redirecionado para o index
        if(!$row){
            return redirect()->route('cursos.index');
        }

        //Deletando o arquivo caso já exista algum
        if(Storage::exists($row->imagem))
            Storage::delete($row->imagem);

        //Deleta o registro
        $row->delete();

        //Retorno com mensagem de sucesso
        return redirect()
            ->route('cursos.index')
            ->with('message', 'Curso removido com sucesso!');
    }
}
