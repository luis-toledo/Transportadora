<x-layout title="Editar Carreta">
    <form action="/carretas/atualizar/{{$carreta->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="tipo" class="form-label">Tipo</label>
          <input
            type="text" name="tipo" class="form-control" id="tipo"
            value="{{$carreta->tipo}}"
          />
        </div>
        <div class="mb-3">
          <label for="capacidade" class="form-label">Capacidade de carga</label>
          <input
            type="number" name="capacidade" class="form-control" id="capacidade"
            value="{{$carreta->capacidade_carga}}"
          />
        </div>
        <div class="mb-3">
            <label for="ano" class="form-label">Ano de fabricação</label>
            <input
              type="number" name="ano" class="form-control" id="ano"
              value="{{$carreta->ano_fabricacao}}"
            />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>
