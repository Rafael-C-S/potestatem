<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/main.css')}}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
    <title>{{config('app.name')}} - @yield('title')</title>
</head>
<body>
    <div id="main">
        <div class="menu">
            <ul id="nav">
                <li><a href="{{route('painel.index')}}">INÍCIO</a></li>
                <li><a href="{{route('cursos.index')}}">CURSOS</a></li>
                <li><a href="{{route('alunos.index')}}">ALUNOS</a></li>
                <li><a href="{{route('relatorios.index')}}">RELATÓRIOS</a></li>
                <li><a href="/logout">SAIR</a></li>
            </ul>
        </div>
        <div id="conteudo">
            @yield('conteudo')
        </div>
    </div>
</body>
</html>
{{-- Comentário --}}