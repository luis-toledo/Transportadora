<x-layout title="Caminhões" >

    <div class="d-flex flex-row align-items-center gap-3 my-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-truck-flatbed " viewBox="0 0 16 16">
            <path d="M11.5 4a.5.5 0 0 1 .5.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-4 0 1 1 0 0 1-1-1v-1h11V4.5a.5.5 0 0 1 .5-.5zM3 11a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm1.732 0h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4a2 2 0 0 1 1.732 1z"/>
          </svg>
        <h1 class="text-light">Caminhões</h1>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Modelo</th>
                <th scope="col">Placa</th>
                <th scope="col">Categoria de CNH</th>
                <th scope="col">Ano</th>
                <th scope="col">Motorista</th>
                <th scope="col">Carreta</th>
                <th scope="col">Açoes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($caminhoes as $caminhoes)

                <tr>
                    <td>{{ $caminhoes->modelo }}</td>
                    <td>{{ $caminhoes->placa }}</td>
                    <td>{{ $caminhoes->categoria_cnh_necessaria }}</td>
                    <td>{{ $caminhoes->ano }}</td>
                    <td>{{ $caminhoes->nome }}</td>
                    <td>{{ $caminhoes->tipo }}</td>
                    <td>
                        <div class="d-flex gap-3 align-items-center">
                            <a href="/caminhoes/editar/{{ $caminhoes->id }}" class="btn btn-primary">Editar</a>
                            <form action="/caminhoes/deletar/{{ $caminhoes->id }}" method="POST">
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
    <a class=" btn btn-primary" href="/caminhoes/criar">Cadastrar um novo Caminhão</a>

</x-layout>

