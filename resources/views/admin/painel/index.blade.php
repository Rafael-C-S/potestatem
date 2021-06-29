@extends('layouts.admin.admin')

@section('conteudo')

    <h1 class="title">PAINEL ADMINISTRATIVO</h1>

    @if(Auth::check())
        Olá {{Auth::name()}},<br>
    @endif

    <p>
        Utilize o MENU ao lado para gerenciar os recursos do sistema.
    </p>

@endsection