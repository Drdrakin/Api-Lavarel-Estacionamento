@extends('layouts.main')

@section('title', 'Cadastrar Veículo')

@section('content')
    <h1>Cadastro de Novos Veículos</h1>
    <div id="vehicle-create-container" class="col-md-6 offset-md3">
        {{-- Foi necessário essa url() --}}
        <form action="{{ url("/vehicles") }}" method="POST">

            {{--Essa diretiva é necessária para adicionar dados no campo pois o blade protege caso contrário --}}
            @csrf

            <div class="form-group">
                <label for="placa">Placa: </label>
                <input type="text" class="form-control" id="placa" name="placa" placeholder="BRA2E19">
            </div>
            <div class="form-group">
                <label for="modelo">Modelo: </label>
                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Corsa rebaixado">
            </div>
            <div class="form-group">
                <label for="cor">Cor: </label>
                <input type="text" class="form-control" id="cor" name="cor" placeholder="Amarelo estelar">
            </div>
            <div class="form-group">
                <label for="id_cliente">Dono: </label>
                <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="Fulano de tal">
            </div>
            <input type="submit" class="btn btn-primary" value="Registrar Veículo">
        </form>
    </div>
@endsection
    