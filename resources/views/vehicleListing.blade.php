@extends('layouts.main')

@section('title', 'Veículos')

@section('content')
    <h1>Listagem de Veículos Presentes</h1>

    @foreach ($veiculos as $veiculo)
        <div class="card col-md3">
            <div class="card-body flex-rows">
                <h5 class="card-title">{{$veiculo->modelo}}</h5>
                <p class="card-text little-margin">Placa: {{$veiculo->placa}}</p>
                <p class="card-text little-margin">Dono: {{$veiculo->cliente->nome}}</p>
                <p class="card-text little-margin">Chegou em: {{$veiculo->hora_entrada}}</p>
                <a href="#" class="btn btn-primary">Alterar Dados</a>
                <a href="#" class="btn btn-primary">Retirar Veiculo</a>
            </div>
        </div>
    @endforeach

@endsection