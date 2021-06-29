<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Aluno;
use App\Http\Requests\AlunoRequest;
use App\Models\AlunoCurso;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    
    private $alunos;
    private $cursos;

    public function __construct(Aluno $alunos, Curso $cursos)
    {
        //Recebendo a classe o modelo curso
        $this->alunos = $alunos;
        $this->cursos = $cursos;
    }

    public function index()
    {
        //Selecionando todos os cursos
        $rows = $this->alunos->latest()->paginate(10);

        //Renderizando a view
        return view('admin.alunos.index', compact('rows'));
    }

    public function create()
    {
        //Retorna a view do formulário

        $cursos = $this->cursos->all();

        return view('admin.alunos.create', compact('cursos'));
    }

    public function store(AlunoRequest $request)
    {
        //Recebe todos os inputs do formulário
        $input = $request->all();
        if(!isset($input['curso'])){
            return back()
                ->withInput()
                ->with('message', 'O cadastro do aluno só poderá ser efetuado mediante a escolha de um curso.');
        }

        //Checa se não ocorreu o processo de registro
        if(!($aluno = $this->alunos->create($input))) return back()->withInput();

        //Realiza o registro no banco de dados e atribui a variável os dados registrado no banco
        $input['aluno_id'] = $aluno->id;
        $aluno_curso = new AlunoCurso();
        $aluno_curso_result = $aluno_curso->salva($input);

        //Retorna para a lista de cursos
        return redirect()
            ->route('alunos.index')
            ->with('message', 'Alunos cadastrado com sucesso!');
    }

    public function show($id)
    {
        //Consultando os regitros no banco de dados
        $row = $this->alunos->find($id);
        
        //Caso  não tenha registro retorna para o index
        if(!$row) return redirect()->route('alunos.index');

        //Exibe os dados do curso
        return view('admin.alunos.show', compact('row'));
    }

    public function edit($id)
    {
        //Consultando os regitros no banco de dados
        $row = $this->alunos->find($id);
        
        //Consultando registro dos cursos
        $cursos = $this->cursos->all();

        //Caso não tenha registro retorna para o index
        if(!$row) return redirect()->route('alunos.index');

        //Exibe o formulário para edição
        return view('admin.alunos.edit', compact('row', 'cursos'));
    }

    public function update($id, AlunoRequest $request)
    {
        //Recebendo os inputs
        $input = $request->all();

        //Consultando o registro
        $row = $this->alunos->find($id);
        
        //Caso não encontre o registro o mesmo voltará para a tela anterior 
        if(!$row) return redirect()->back();

        //Realizando o processo de update
        $row->update($input);

        //Redireciona com uma mensagem de sucesso
        return redirect()
            ->route('alunos.index')
            ->with('message', 'Aluno atualizado com sucesso!');
    }

    public function destroy($id)
    {
        //consulta o regitro
        $row = $this->alunos->find($id);

        //Caso não encontre o mesmo será redirecionado para o index
        if(!$row){
            return redirect()->route('alunos.index');
        }

        //Deleta o registro
        $row->delete();

        //Retorno com mensagem de sucesso
        return redirect()
            ->route('alunos.index')
            ->with('message', 'Aluno removido com sucesso!');
    }
}
