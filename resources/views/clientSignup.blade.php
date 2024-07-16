@extends('layouts.main')

@section('title', 'Entrar')

@section('content')
    <h1>Clientes Cadastrados</h1>

    @foreach ($clientes as $client)
        <div class="card col-md3">
            <div class="card-body flex-rows">
                <h5 class="card-title">{{$client->nome}}</h5>
                <p class="card-text little-margin">Email: {{$client->email}}</p>
                <p class="card-text little-margin">Telefone: {{$client->telefone}}</p>
                <p class="card-text little-margin">Cadastrado: {{$client->cadastrado}}</p>
                <a href="#" class="btn btn-primary">Alterar Dados</a>
                <a href="#" class="btn btn-primary">Retirar cliente</a>
            </div>
        </div>
    @endforeach
@endsection