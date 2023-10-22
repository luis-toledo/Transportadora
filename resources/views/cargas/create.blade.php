<x-layout title="Cadastro de Cargas">
    <form action="/cargas/salvar" method="POST">
        @csrf
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <input type="text" name="descricao" class="form-control" id="descricao" />
        </div>
        <div class="mb-3">
          <label for="peso" class="form-label">Peso</label>
          <input type="number" name="peso" class="form-control" id="peso" />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>
