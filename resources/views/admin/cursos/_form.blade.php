<div class="form">
    <form action="{{route('cursos.store')}}" method="POST" id="form" class="form-cursos" files=true>
        <div class="row">
            <div class="col">
                <label for="nome">Nome *</label><br>
                <input type="text" name="nome" id="nome" placeholder="Informe o nome ou título do curso" value="" required>
            </div>
        </div>
        <div class="row">
            <input type="file" name="imagem" id="imagem">
        </div>
        <div class="row">
            <div class="col">
                <label for="nome">Conteúdo programático *</label><br>
                <textarea name="conteudo_programatico" id="conteudo_programatico" placeholder="Informe o conteúdo do curso" cols="30" rows="10" required></textarea>
            </div>
        </div>
        
        @csrf
        <div class="actions">
            <input type="submit" name="submit" value="CADASTRAR">
        </div>
    </form>
</div>