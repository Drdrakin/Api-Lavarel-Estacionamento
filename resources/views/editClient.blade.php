@extends('layouts.main')

@section('title', 'Cadastrar')

@section('content')
    <h1>Editar Dados do Cliente {{$cliente->nome}}</h1>
    <div id="vehicle-create-container" class="col-md-6 offset-md3 flex-rows">
        
        <form action="/editClient/update/{{$cliente->id}}" method="POST" class="forms">

            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="José Ricardo" value="{{$cliente->nome}}">
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Seu email" value="{{$cliente->email}}">
            </div>
            <div class="form-group">
                <label for="senha">Senha: </label>
                <input type="text" class="form-control" id="senha" name="senha" placeholder="Sua senha" value="{{$cliente->senha}}">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone: </label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="40028922" value="{{$cliente->telefone}}">
            </div>
            <input type="submit" class="btn btn-success" value="Alterar Dados">
        </form>
    </div>
@endsection