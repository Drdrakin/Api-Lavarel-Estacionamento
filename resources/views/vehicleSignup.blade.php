@extends('layouts.main')

@section('title', 'Cadastrar Veículo')

@section('content')
    <div id="vehicle-create-container" class="col-md-6 offset-md3 flex-rows">
        {{-- Foi necessário essa url() --}}
        <form action="{{ url("/vehicles") }}" method="POST" class="forms">
            <h1>Cadastro de Novos Veículos</h1>

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
            <input type="submit" class="btn btn-success" value="Registrar Veículo">
        </form>

        <form action="{{ url("/clientSignup") }}" method="POST" class="forms">

            <h1>Cadastro de Clientes</h1>
            @csrf
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="José Ricardo">
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Seu email">
            </div>
            <div class="form-group">
                <label for="senha">Senha: </label>
                <input type="text" class="form-control" id="senha" name="senha" placeholder="Sua senha">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone: </label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="40028922">
            </div>
            <input type="submit" class="btn btn-success" value="Registar Cliente">
        </form>
    </div>
@endsection
    