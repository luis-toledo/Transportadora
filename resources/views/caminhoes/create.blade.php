<x-layout title="Cadastro de Caminhão">
    <form action="/caminhoes/salvar" method="POST">
        @csrf
        <div class="mb-3">
          <label for="modelo" class="form-label">Modelo</label>
          <input type="text" name="modelo" class="form-control" id="modelo" />
        </div>
        <div class="mb-3">
          <label for="placa" class="form-label">Placa</label>
          <input type="text" name="placa" class="form-control" id="placa" />
        </div>
        <div class="mb-3">
          <label for="categoria" class="form-label">Categoria da CNH</label>
          <select class="form-select" name="categoria" id="categoria">
            <option selected value="1">C</option>
            <option value="2">D</option>
            <option value="3">E</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="ano" class="form-label">Ano</label>
          <input type="number" name="ano" class="form-control" id="ano" />
        </div>
        <div class="mb-3">
          <label for="motorista" class="form-label">Motorista</label>
          <select class="form-select" name="motorista" id="motorista">
            @foreach ($motoristas as $motoristas)
                <option value="{{$motoristas->id}}">{{$motoristas->nome}}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="carreta" class="form-label">Carreta</label>
          <select class="form-select" name="carreta" id="carreta">
            @foreach ($carretas as $carretas)
                <option value="{{$carretas->id}}">{{$carretas->tipo}}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>




