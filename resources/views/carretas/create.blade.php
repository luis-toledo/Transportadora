<x-layout title="Cadastro de Carretas">
    <form action="/carretas/salvar" method="POST">
        @csrf
        <div class="mb-3">
          <label for="tipo" class="form-label">Tipo</label>
          <input type="text" name="tipo" class="form-control" id="tipo" />
        </div>
        <div class="mb-3">
          <label for="capacidade" class="form-label">Capacidade de carga</label>
          <input type="number" name="capacidade" class="form-control" id="capacidade" />
        </div>
        <div class="mb-3">
            <label for="ano" class="form-label">Ano de fabricação</label>
            <input type="number" name="ano" class="form-control" id="ano" />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>
