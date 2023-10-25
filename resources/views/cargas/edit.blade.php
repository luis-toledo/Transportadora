<x-layout title="Editar Carga">
    <form action="/cargas/atualizar/{{$carga->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="descricao" class="form-label text-light">Descrição</label>
          <input
            type="text" name="descricao" class="form-control" id="descricao"
            value="{{$carga->descricao}}"
          />
        </div>
        <div class="mb-3">
          <label for="peso" class="form-label text-light">Peso</label>
          <input
            type="number" name="peso" class="form-control" id="peso"
            value="{{$carga->peso}}"
          />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>
