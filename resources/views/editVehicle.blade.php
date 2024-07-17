@extends('layouts.main')

@section('title', 'Cadastrar')

@section('content')
    <h1>Editar Dados do Veículo {{$veiculo->nome}}</h1>
    <div id="vehicle-create-container" class="col-md-6 offset-md3 flex-rows">
        
        <form action="/editVehicle/update/{{$veiculo->id}}" method="POST" class="forms">

            {{--Essa diretiva é necessária para adicionar dados no campo pois o blade protege caso contrário --}}
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="placa">Placa: </label>
                <input type="text" class="form-control" id="placa" name="placa" placeholder="BRA2E19" value="{{$veiculo->placa}}">
            </div>
            <div class="form-group">
                <label for="modelo">Modelo: </label>
                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Corsa rebaixado" value="{{$veiculo->modelo}}">
            </div>
            <div class="form-group">
                <label for="cor">Cor: </label>
                <input type="text" class="form-control" id="cor" name="cor" placeholder="Amarelo estelar" value="{{$veiculo->cor}}">
            </div>
            <div class="form-group">
                <label for="id_cliente">Dono: </label>
                <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="Fulano de tal" value="{{$veiculo->dono}}">
            </div>
            <input type="submit" class="btn btn-success" value="Alterar Dados">
        </form>
    </div>
@endsection