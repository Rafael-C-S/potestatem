@extends('layouts.admin.admin')

@section('title', 'ALUNOS')

@section('conteudo')
<h1 class="title">ALUNOS</h1>
<div class="btn-acoes">
    <a href="{{route('alunos.create')}}" class="btn-novo">Novo Aluno</a>
</div>
{{-- <div id="search-form">
    @include('admin.alunos._partials.form_search')
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
            <th>CPF</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->nome}}</td>
                <td>{{$row->cpf}}</td>
                <td>{{$row->email}}</td>
                <td>
                    [<a href="{{route('alunos.show', $row->id)}}" class="">Visualizar</a>] |
                    [<a href="{{route('alunos.edit', $row->id)}}" class="">Editar</a>]
                </td>
            </tr>        
        @empty
            <tr>
                <td colspan="5">Nenhum registro encontrado</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div id="paginacao">
    {{-- Criando paginação básica --}}
    {{$rows->links()}}
</div>
@endsection