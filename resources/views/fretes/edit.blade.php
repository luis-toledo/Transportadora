<x-layout title="Editar Frete">
    <form action="/fretes/atualizar/{{$frete->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="descricao" class="form-label">Descricao</label>
          <input
            type="text" name="descricao" class="form-control" id="descricao"
            value="{{$frete->tipo_carga}}"
          />
        </div>

        <div class="mb-3">
          <label for="kilometros" class="form-label">kilometros</label>
          <input
            type="number" name="kilometros" class="form-control" id="kilometros"
            value="{{$frete->kilometros}}"
          />
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input
              type="number" name="valor" class="form-control" id="valor"
              value="{{$frete->valor}}"
            />
        </div>

        <div class="mb-3">
            <label for="caminhao" class="form-label">Caminhao</label>
            <select class="form-select" name="caminhao" id="caminhao">
              @foreach ($caminhoes as $caminhoes)
                  @if ($caminhoes->id != $caminhao->id)
                    <option value="{{$caminhoes->id}}">{{$caminhoes->modelo}}</option>
                  @else
                    <option value="{{$caminhao->id}}" selected>{{$caminhao->modelo}}</option>
                  @endif

                  <option value="{{$caminhoes->id}}">{{$caminhoes->modelo}}</option>
              @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="carga" class="form-label">Carga</label>
            <select class="form-select" name="carga" id="carga">
                @foreach ($cargas as $cargas)
                    @if ($cargas->id != $carga->id)
                      <option value="{{$cargas->id}}">{{$cargas->descricao}}</option>
                    @else
                        <option value="{{$carga->id}}" selected>{{$carga->descricao}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>
