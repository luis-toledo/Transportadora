<x-layout title="Cargas">
    <a href="/cargas/criar">Cadastrar uma nova Carga</a>
    <div class="d-flex flex-row align-items-center gap-3 my-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
          </svg>
        <h1 class="text-light">Cargas</h1>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Descricao</th>
                <th scope="col">Peso</th>
                <th scope="col">Açoes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cargas as $cargas)
                <tr>
                    <td>{{ $cargas->descricao }}</td>
                    <td>{{ $cargas->peso }}</td>
                    <td>
                        <div class="d-flex gap-3 align-items-center">
                            <a href="/cargas/editar/{{ $cargas->id }}" class="btn btn-primary">Editar</a>
                            <form action="/cargas/deletar/{{ $cargas->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
