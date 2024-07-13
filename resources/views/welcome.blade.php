{{--ESSA PÁGINA É APENAS DE TESTE E COMENTÁRIOS E NÃO ENTRARÁ NO PRODUTO FINAL--}}

@extends('layouts.main')

@section('title', 'Estacionamento') {{--O title não precisa de @endsection, mas o content sim, sendo fechado no final (APÓS) o conteúdo,--}}
    
@section('content')

    <h1> Titulo </h1>

    <p> {{$nome}} </p>

    @for($i = 0; $i < count($arr); $i++)
        <p> {{$arr[$i]}} - {{ $i }}</p>
        @if ($i == 2)
        <p> O i é 2 </p>
        @endif
    @endfor

    @php
        $name = "RODRIGO FARO";
        echo $name;
    @endphp

    {{-- Este é o comentário do blade, que não é renderizado na view, não sendo possível
    de se verificar com o 'inspecionar elemento' ou seja uma forma 'segura' de fazer comentários com o blade--}}

    @foreach ($nomes as $item)
    <p>{{$loop->index}}</p>
    <p>{{$item}}</p>    
    @endforeach

@endsection

