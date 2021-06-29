<form action="{{route('cursos.search')}}" method="POST">
    @csrf
    <input type="text" name="search" placeholder="Pesquisar">
    <button type="submit">Pesquisar</button>
</form>