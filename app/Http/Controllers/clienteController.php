<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;

class clienteController extends Controller
{

    public function index(){
                
        $clients = Cliente::all();

        return view('welcome');
    }

    public function show(){
                
        $clientes = Cliente::all();

        return view('clientListing', 
        [
            'clientes'=>$clientes
        ]);
    }

    public function store(Request $request){
                
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->senha = $request->senha;
        $cliente->telefone = $request->telefone;

        $cliente->save();

        return redirect()->route('clientListing')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function destroy($id){

        $cliente = Cliente::findOrFail($id);

        $cliente->deletado = 1;

        $cliente->save();

        return redirect()->route('clientListing')->with('success', 'Cliente excluído com sucesso!');
    }
}
