@extends('layouts.admin.admin')

@section('conteudo')
<h1 class="title">CURSOS</h1>
<div class="btn-acoes">
    <a href="{{route('cursos.create')}}" class="btn-novo">Novo Curso</a>
</div>
<table border>
    <thead>
        <tr>
            <th>NOME</th>
            <th>IMAGEM</th>
            <th>CONTEÚDO<br> PROGRAMÁTICO</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>{{$row->nome}}</td>
                <td>{{(!$row->imagem) ? '-' : $row->imagem}}</td>
                <td>{{$row->conteudo_programatico}}</td>
                <td>--</td>
            </tr>        
        @empty
            <tr>
                <td colspan="4">Nenhum registro encontrado</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection