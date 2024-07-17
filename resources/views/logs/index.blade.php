@extends('layouts.main')

@section('title', 'Logs')

@section('content')
    <h1>Filtro de Logs de Clientes e Veículos</h1>

    <form action="{{ route('logs.filter') }}" method="POST" class="mb-4">
        @csrf
        <div class="form-group mb-3">
            <label for="start_date">Data de Início:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="end_date">Data de Fim:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="deletado">Deletado?</label>
            <select name="deletado" id="deletado" class="form-control">
                <option value="">Qualquer</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="cor">Cor:</label>
            <select name="cor" id="cor" class="form-control">
                <option value="">Selecione uma cor</option>
                @foreach($cores as $cor)
                    <option value="{{ $cor->cor }}">{{ $cor->cor }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="dono">Dono:</label>
            <input type="text" name="dono" id="dono" class="form-control" placeholder="Digite o nome do dono">
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    @if(isset($clientes) && isset($veiculos))
        <div class="row">
            <div class="col-md-6">
                <h2>Clientes Registrados</h2>
                <div class="row">
                    @foreach ($clientes as $cliente)
                        <div class="col-md-6 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cliente->nome }}</h5>
                                    <p class="card-text">Email: {{ $cliente->email }}</p>
                                    <p class="card-text">Telefone: {{ $cliente->telefone }}</p>
                                    <p class="card-text">Cadastrado: {{ $cliente->cadastrado }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <h2>Veículos Registrados</h2>
                <div class="row">
                    @foreach ($veiculos as $veiculo)
                        <div class="col-md-6 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $veiculo->modelo }}</h5>
                                    <p class="card-text">Placa: {{ $veiculo->placa }}</p>
                                    <p class="card-text">Cor: {{ $veiculo->cor }}</p>
                                    <p class="card-text">Hora de Entrada: {{ $veiculo->hora_entrada }}</p>
                                    <p class="card-text">Hora de Saída: {{ $veiculo->hora_saida }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
