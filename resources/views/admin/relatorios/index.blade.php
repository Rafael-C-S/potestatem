@extends('layouts.admin.admin')

@section('title', 'RELATÓRIOS')

@section('conteudo')
    <h1 class="title">RELATÓRIOS</h1>

    <div class="content-show">
        <div>
            <h3> >> CURSOS</h3>
                > <a href="{{route('relatorios.curso.acimadez')}}">Relatório de Curso com mais de 10 alunos matriculados</a>
            <h3> >> ALUNOS</h3>
                > <a href="#!">Relatórios em processo de desenvolvimento</a>
        </div>
    </div>

@endsection