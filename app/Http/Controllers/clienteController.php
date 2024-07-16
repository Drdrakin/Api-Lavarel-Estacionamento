<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class clienteController extends Controller
{
    public function index(){
                
        $clients = Cliente::all();

        return view('welcome');
    }

    public function show(){
                
        $clientes = Cliente::all();

        return view('clientSignup', 
        [
            'clientes'=>$clientes
        ]);
    }

    public function create(){

        return view('clientSignup');
    // Pode-se observar, que nos 2 primeiros exemplos é retornado o objeto{?} com o mesmo nome que a variável local, mas no último não,
    // pois O QUE É PASSADO PARA A VIEW É A CHAVE
    // 'bla' não precisa bater na view, mas nomes precisa bater como $nomes na view para resgatar o valor.
    }
}
