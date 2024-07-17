<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\veiculoController;

//É passado em um array, o nome da controller com seu tipo- ::class e nome da ACTION 'index'
//Ou seja, não é passado dados aqui, sendo exclusivo apenas para rotas e actions
//PS: as controllers precisam ser importadas lá em cima

//Home
Route::get('/', [clienteController::class, 'index']);

Route::get('/login', function () {
    return view('login');
});

//Rotas de cadastro
Route::get('/vehicles', [veiculoController::class, 'create']);

Route::post('/vehicles', [veiculoController::class, 'store']);

Route::post('/clientSignup', [clienteController::class, 'store']);

//Rotas de listagem dos dados
Route::get('/clientListing', [clienteController::class, 'show'])->name('clientListing');

Route::get('/listVehicles', [veiculoController::class, 'index'])->name('listVehicles');


//Rotas para deletar
Route::delete('/clientListing/{id}', [clienteController::class, 'destroy']);

Route::delete('/listVehicles/{id}', [veiculoController::class, 'destroy']);

//Rotas de update
///Cliente
Route::get('/editClient/{id}', [clienteController::class, 'edit']);

Route::put('/editClient/update/{id}', [clienteController::class, 'update']);

///Veiculo
Route::get('/editVehicle/{id}', [veiculoController::class, 'edit']);

Route::put('/editVehicle/update/{id}', [veiculoController::class, 'update']);

//É possível passar parametros da seguinte forma:
Route::get('/logs/{data?}', function ($data = 'Hoje') {
    return view('logfilter', ['data' => $data]);
});

