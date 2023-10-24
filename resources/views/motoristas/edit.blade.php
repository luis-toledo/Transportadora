<x-layout title="Editar Motorista">
    <form action="/motoristas/atualizar/{{$motorista->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input
            type="text" name="nome" class="form-control" id="nome"
            value="{{$motorista->nome}}"
          />
        </div>
        <div class="mb-3">
          <label for="idade" class="form-label">Idade</label>
          <input
            type="number" name="idade" class="form-control" id="idade"
            value="{{$motorista->idade}}"
          />
        </div>
        <div class="mb-3">
          <label for="categoria" class="form-label">Categoria da CNH</label>
          <select class="form-select" name="categoria" id="categoria">
            <option selected value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>
