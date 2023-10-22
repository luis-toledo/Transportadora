<x-layout title="Cadastro de Fretes">
    <form action="/fretes/salvar" method="POST">
        @csrf
        <div class="mb-3">
          <label for="descricao" class="form-label">Descricao</label>
          <input type="text" name="descricao" class="form-control" id="descricao" />
        </div>

        <div class="mb-3">
          <label for="kilometros" class="form-label">kilometros</label>
          <input type="number" name="kilometros" class="form-control" id="kilometros" />
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" name="valor" class="form-control" id="valor" />
        </div>

        <div class="mb-3">
            <label for="caminhao" class="form-label">Caminhao</label>
            <select class="form-select" name="caminhao" id="caminhao">
              @foreach ($caminhoes as $caminhoes)
                  <option value="{{$caminhoes->id}}">{{$caminhoes->modelo}}</option>
              @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="carga" class="form-label">Carga</label>
            <select class="form-select" name="carga" id="carga">
                @foreach ($cargas as $cargas)
                    <option value="{{$cargas->id}}">{{$cargas->descricao}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>
