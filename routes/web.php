<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $nome = "Guilherme";
    $arr = [10,20,30,40,50];
    $bla = ["Maria", "João", "Carlinhos", "Broto", "Antetidigimon", "Lucas Bahia"];

    return view('welcome', 
    [
        'nome' => $nome,
        'arr' => $arr,
        'nomes' => $bla
    ]);

    // Pode-se observar, que nos 2 primeiros exemplos é retornado o objeto{?} com o mesmo nome que a variável local, mas no último não,
    // pois O QUE É PASSADO PARA A VIEW É A CHAVE
    // 'bla' não precisa bater na view, mas nomes precisa bater como $nomes na view para resgatar o valor.
});

Route::get('/vehicles', function () {
    return view('vehicleSignup');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('clientSignup');
});

Route::get('/listVehicles', function () {
    return view('vehicleListing');
});

//É possível passar parametros da seguinte forma:
$curDate = $date = date('m/d/Y h:i:s a', time());

Route::get('/logs/{data?}', function ($data = 1) {
    return view('logfilter', ['data' => $data]);
});

