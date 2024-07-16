<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Veiculo;

class veiculoController extends Controller
{
    public function index(){
        
        //Método antigo para puxar tudo
        //$veiculos = Veiculo::all();

        //Método novo com ::with para puxar a relação
        $veiculos = Veiculo::with('cliente')->get();

        //O cliente é pesquisado por parametro no browser dessa forma: http://127.0.0.1:8000/listVehicles?search=Rodrigo    
        $cliente = request('search');

        return view('vehicleListing', 
        [
            'veiculos'=> $veiculos
        ]);
    }

    public function create(){

        $veiculos = Veiculo::with('cliente')->get();

        return view('vehicleSignup', 
        [
            'veiculos'=> $veiculos
        ]);
    }
}
