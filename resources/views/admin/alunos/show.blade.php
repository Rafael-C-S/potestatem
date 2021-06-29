@extends('layouts.admin.admin')

@section('title', 'ALUNOS - Visualiza')

@section('conteudo')
    <h1 class="title">ALUNOS - Detalhes do Curso</h1>
    <div class="btn-acoes">
        <form action="{{ route('alunos.destroy', $row->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{route('alunos.edit', $row->id)}}" class="btn-editar">Editar</a>
            <a href="{{route('alunos.index')}}" class="btn-cancelar">VOLTAR</a>
            <button id="btn-excluir" class="btn-excluir" title="Delete">Delete</button>
        </form>
    </div>
    <div id="content-show">
        <b>Código do aluno:</b> {{$row->id}}<br><br>
        <b>Nome:</b> {{$row->nome}}<br><br>
        <b>CPF:</b> {{$row->cpf}}<br><br>
        <b>EMAIL:</b> {{$row->email}}<br><br>
        <p class="cursos">
            <b>Lista de Cursos</b>
            <ul style="width: 50%">
                @forelse($row->cursos as $item)
                    <li style="margin-bottom: 10px">
                        <p style="padding: 3px;background-color:#666;color:#FFF">
                            &rarr; {{$item->nome}}
                        </p>
                        <b>Conteúdo Programático: </b>{{$item->conteudo_programatico}}
                    </li>
                @empty

                @endforelse
            </ul>
        </p>
    </div>

    
@endsection