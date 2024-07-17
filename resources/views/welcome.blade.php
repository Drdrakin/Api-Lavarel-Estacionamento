@extends('layouts.main')

@section('title', 'Estacionamento') {{-- O title não precisa de @endsection, mas o content sim, sendo fechado no final (APÓS) o conteúdo --}}
    
@section('content')
    <div class="text-center">
        <h1>Bem Vindo ao seu Estacionamento</h1>
        <p class="lead">Gerencie seu estacionamento de forma eficiente e prática.</p>
        <a href="/clientSignup" class="btn btn-primary">Entrar</a>
    </div>
@endsection
