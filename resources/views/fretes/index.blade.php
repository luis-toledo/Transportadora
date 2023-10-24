<x-layout title="Fretes">
    <a href="/fretes/criar">Cadastrar um Frete</a>
    <div class="d-flex flex-row align-items-center gap-3 my-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
          </svg>
        <h1 class="text-light">Fretes</h1>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tipo de Carga</th>
                <th scope="col">Valor</th>
                <th scope="col">Kilometros</th>
                <th scope="col">Caminhao</th>
                <th scope="col">Carga</th>
                <th scope="col">Açoes</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($fretes as $fretes)
                    <tr>
                        <td>{{ $fretes->tipo_carga }}</td>
                        <td>{{ $fretes->valor }}</td>
                        <td>{{ $fretes->kilometros }}</td>
                        <td>{{ $fretes->modelo }}</td>
                        <td>{{ $fretes->descricao }}</td>
                        <td>
                            <div class="d-flex gap-3 align-items-center">
                                <a href="/fretes/editar/{{ $fretes->id }}" class="btn btn-primary">Editar</a>
                                <form action="/fretes/deletar/{{ $fretes->id }}" method="POST">
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
