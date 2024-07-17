<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\veiculoController;

//É passado em um array, o nome da controller com seu tipo- ::class e nome da ACTION 'index'
//Ou seja, não é passado dados aqui, sendo exclusivo apenas para rotas e actions
//PS: as controllers precisam ser importadas lá em cima
Route::get('/', [clienteController::class, 'index']);

Route::get('/vehicles', [veiculoController::class, 'create']);

Route::get('/clientListing', [clienteController::class, 'show'])->name('clientListing');

Route::get('/listVehicles', [veiculoController::class, 'index'])->name('listVehicles');

Route::post('/vehicles', [veiculoController::class, 'store']);

Route::post('/clientSignup', [clienteController::class, 'store']);

Route::delete('/clientListing/{id}', [clienteController::class, 'destroy']);

Route::delete('/listVehicles/{id}', [veiculoController::class, 'destroy']);

Route::get('/login', function () {
    return view('login');
});

//É possível passar parametros da seguinte forma:

Route::get('/logs/{data?}', function ($data = 'Hoje') {
    return view('logfilter', ['data' => $data]);
});

