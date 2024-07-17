@extends('layouts.main')

@section('title', 'Estacionamento') {{-- O title não precisa de @endsection, mas o content sim, sendo fechado no final (APÓS) o conteúdo --}}
    
@section('content')
    <div class="text-center">
        <h1>Bem Vindo ao seu Estacionamento</h1>
        <p class="lead">Gerencie seu estacionamento de forma eficiente e prática.</p>
        @guest
            <a href="/login" class="btn btn-primary">Entrar</a>  
        @endguest
        @auth
            <section>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="card">
                            <a href="/listVehicles">
                                <img src="/img/parking.jpg" class="card-img-top" alt="Imagem 1">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Veículos do Estacionamento</h5>
                                <p class="card-text">Acesse a listagem de todos os veículos presentes, e também os edite ou exclua</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <a href="/clientListing">
                                <img src="/img/clients.webp" class="card-img-top" alt="Imagem 2">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Clientes</h5>
                                <p class="card-text">Acesse a listagem de todos os clientes presentes, os editando ou excluindo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <a href="/logs">
                                <img src="/img/logs.jpg" class="card-img-top" alt="Imagem 3">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Registros</h5>
                                <p class="card-text">Acesse um filtro para verificar todos os veículos que já passaram pelo sistema</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>   
        @endauth
    </div>
@endsection
