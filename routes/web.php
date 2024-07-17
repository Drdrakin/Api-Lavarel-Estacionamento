<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\veiculoController;
use App\Http\Controllers\logController;

//É passado em um array, o nome da controller com seu tipo- ::class e nome da ACTION 'index'
//Ou seja, não é passado dados aqui, sendo exclusivo apenas para rotas e actions
//PS: as controllers precisam ser importadas lá em cima

//Aqui estão as rotas protegidas, ou seja todas que tem qualquer informação do banco
Route::middleware(['auth'])->group(function () {
    
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
    Route::get('/editClient/{id}', [clienteController::class, 'edit']);
    Route::put('/editClient/update/{id}', [clienteController::class, 'update']);
    Route::get('/editVehicle/{id}', [veiculoController::class, 'edit']);
    Route::put('/editVehicle/update/{id}', [veiculoController::class, 'update']);

    //Requisito do filtro
    Route::get('/logs', [LogController::class, 'index']);
    Route::post('/logs/filter', [LogController::class, 'filter'])->name('logs.filter');
});

//Welcome da aplicação
Route::get('/', [clienteController::class, 'index']);
Route::get('/login', function () {
    return view('login');
});

//Rotas do laravel ui bootstrap de autenticação
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



