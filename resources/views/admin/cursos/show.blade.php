@extends('layouts.admin.admin')

@section('conteudo')
    <h1 class="title">CURSOS - Detalhes do Curso</h1>
    <div class="btn-acoes">
        <form action="{{ route('cursos.destroy', $row->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{route('cursos.edit', $row->id)}}" class="btn-editar">Editar</a>
            <button id="btn-excluir" class="btn-excluir" title="Delete">Delete</button>
        </form>
        {{-- <a href="{{route('cursos.destroy', $row->id)}}" class="btn-excluir" >Excluir</a> --}}
    </div>
    <div id="content-show">
        <img src="" alt="Imagem do curso"><br><br>
        <b>Código do curso:</b> {{$row->id}}<br><br>
        <b>Nome do curso:</b> {{$row->nome}}<br><br>
        <b>Programa do Curso:</b><br>
        {{$row->conteudo_programatico}}
    </div>
    
@endsection