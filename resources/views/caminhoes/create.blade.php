<x-layout title="Cadastro de Caminhão">
    <form action="/caminhoes/salvar" method="POST">
        @csrf
        <div class="mb-3">
          <label for="modelo" class="form-label text-light">Modelo</label>
          <input type="text" name="modelo" class="form-control" id="modelo" />
        </div>
        <div class="mb-3">
          <label for="placa" class="form-label text-light">Placa</label>
          <input type="text" name="placa" class="form-control" id="placa" />
        </div>
        <div class="mb-3">
          <label for="categoria" class="form-label text-light">Categoria da CNH</label>
          <select class="form-select" name="categoria" id="categoria">
            <option selected value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="ano" class="form-label text-light">Ano</label>
          <input type="number" name="ano" class="form-control" id="ano" />
        </div>
        <div class="mb-3">
          <label for="motorista" class="form-label text-light">Motorista</label>
          <select class="form-select" name="motorista" id="motorista">
            @foreach ($motoristas as $motoristas)
                <option value="{{$motoristas->id}}">{{$motoristas->nome}}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="carreta" class="form-label text-light">Carreta</label>
          <select class="form-select" name="carreta" id="carreta">
            @foreach ($carretas as $carretas)
                <option value="{{$carretas->id}}">{{$carretas->tipo}}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</x-layout>




