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

<div class="form">
    @if(isset($row))
        <form action="{{route('cursos.update', $row->id)}}" method="POST" id="form" class="form-cursos" files=true>
    @else
        <form action="{{route('cursos.store')}}" method="POST" id="form" class="form-cursos" files=true>    
    @endif
    <form action="{{route('cursos.store')}}" method="POST" id="form" class="form-cursos" files=true>
        @if(isset($row))
            @method('put')
        @endif
        <div class="row">
            <div class="col">
                <label for="nome">Nome *</label><br>
                <input type="text" name="nome" id="nome" placeholder="Informe o nome ou título do curso" value="{{isset($row) ? $row->nome : old('nome')}}">
            </div>
        </div>
        <div class="row">
            <input type="file" name="imagem" id="imagem">
        </div>
        <div class="row">
            <div class="col">
                <label for="nome">Conteúdo programático *</label><br>
                <textarea name="conteudo_programatico" id="conteudo_programatico" placeholder="Informe o conteúdo do curso" cols="30" rows="10">{{isset($row) ? $row->conteudo_programatico : old('conteudo_programatico')}}</textarea>
            </div>
        </div>
        
        @csrf
        <div class="actions">
            <input type="submit" name="submit" value="{{isset($row) ? 'ATUALIZAR' : 'CADASTRAR'}}">
        </div>
    </form>
</div>