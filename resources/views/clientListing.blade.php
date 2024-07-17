@extends('layouts.main')

@section('title', 'Entrar')

@section('content')
    <h1>Clientes Cadastrados</h1>

    @foreach ($clientes as $client)
        @if ($client->deletado == false)
            <div class="card col-md3">
                <div class="card-body ">
                    <h5 class="card-title">{{$client->nome}}</h5>
                    <p class="card-text little-margin">Email: {{$client->email}}</p>
                    <p class="card-text little-margin">Telefone: {{$client->telefone}}</p>
                    <p class="card-text little-margin">Cadastrado: {{$client->cadastrado}}</p>
                    <a href="/editClient/{{$client->id}}" class="btn btn-success">Alterar Dados</a>
                    <form action="/clientListing/{{$client->id}}" method="POST" class="form-card">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir Cliente</button>
                    </form>
                </div>
            </div>
        @endif
    @endforeach
@endsection