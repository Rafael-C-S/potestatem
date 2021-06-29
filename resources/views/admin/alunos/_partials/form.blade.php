<div class="errors">
    @if($errors->any())
        <ul class="ul-errors">
            @foreach ($errors->all() as $error)
                <li>&rarr; {{$error}}</li>
            @endforeach
            <li></li>
        </ul>
    @endif
</div>

<div class="messages">
    @if(session('message'))
        <ul class="ul-messages">
            <li>&rarr; {{session('message')}}</li>
        </ul><br>
    @endif
</div>

<div class="form">
    @if(isset($row))
        <form action="{{route('alunos.update', $row->id)}}" method="POST" id="form" class="form-aluno" enctype="multipart/form-data">
    @else
        <form action="{{route('alunos.store')}}" method="POST" id="form" class="form-alunos" enctype="multipart/form-data">    
    @endif
        @if(isset($row))
            @method('put')
        @endif
        <div class="row">
            <div class="col">
                <label for="nome">Nome *</label><br>
                <input type="text" name="nome" id="nome" placeholder="Informe seu nome completo" value="{{isset($row) ? $row->nome : old('nome')}}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email">Email *</label><br>
                <input type="email" name="email" id="email" placeholder="Informe seu email" value="{{isset($row) ? $row->email : old('email')}}">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="cpf">CPF * <i><small style="color:red">MODELO: 00000000000</small></i></label><br>
                <input type="number" name="cpf" id="cpf" placeholder="Informe seu cpf. Ex.: Digite apenas números" value="{{isset($row) ? $row->cpf : old('cpf')}}">
            </div>
        </div>
        @if(!isset($row))
            <div class="row">
                <div class="col">
                    @foreach($cursos as $curso)
                        <input type="checkbox" id="checkbox" name="curso[]" value="{{ $curso->id }}" style="width:3%">{{$curso->nome}}
                    @endforeach 
                </div>
            </div>
        @endif
        @csrf
        <div class="actions">
            <input type="submit" name="submit" id="submit" value="{{isset($row) ? 'ATUALIZAR' : 'CADASTRAR'}}">
            <a href="{{route('alunos.index')}}" class="btn-cancelar">CANCELAR</a>
        </div>
    </form>
</div>