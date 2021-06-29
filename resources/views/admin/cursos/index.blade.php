@extends('layouts.admin.admin')

@section('title', 'CURSOS')

@section('conteudo')
<h1 class="title">CURSOS</h1>
<div class="btn-acoes">
    <a href="{{route('cursos.create')}}" class="btn-novo">Novo Curso</a>
</div>
{{-- <div id="search-form">
    @include('admin.cursos._partials.form_search')
</div> --}}
<div class="messages">
    @if(session('message'))
        <ul class="ul-messages">
            <li>&rarr; {{session('message')}}</li>
        </ul><br>
    @endif
</div>

<table border>
    <thead>
        <tr>
            <th>CÓDIGO</th>
            <th>NOME</th>
            <th>IMAGEM</th>
            <th>CONTEÚDO<br> PROGRAMÁTICO</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->nome}}</td>
                <td><center>
                    @if(!$row->imagem)
                        -
                    @else
                        <img src="{{url("storage/{$row->imagem}")}}" alt="{{$row->nome}}" width="50">
                    @endif                    
                </center></td>
                <td>{{$row->conteudo_programatico}}</td>
                <td>
                    [<a href="{{route('cursos.show', $row->id)}}" class="">Visualizar</a>] |
                    [<a href="{{route('cursos.edit', $row->id)}}" class="">Editar</a>]
                </td>
            </tr>        
        @empty
            <tr>
                <td colspan="4">Nenhum registro encontrado</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div id="paginacao">
    {{-- Criando paginação básica --}}
    {{$rows->links()}}
</div>
@endsection