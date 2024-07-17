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

    //Importante notar que isso é um update, mesmo usando a convenção de nomenclatura de deleção do Laravel.
    //Para que seja mais fácil puxar os registros nos log, se tivesse dado faltando ainda daria, com triggers no banco de dados
    //e uma tabela dedicada a isso, mas nesse projeto vou focar no uso do Laravel apenas.
    public function destroy($id){

        $cliente = Cliente::findOrFail($id);

        $cliente->deletado = 1;

        $cliente->save();

        return redirect()->route('clientListing')->with('success', 'Cliente excluído com sucesso!');
    }

    public function edit($id){

        $cliente = Cliente::findOrFail($id);

        return view('editClient', ['cliente'=>$cliente]);
    }

    public function update(Request $request){

        //Comando verboso, mas basicamente ele pega o id que veio do cliente específico do front e faz o update de todos os campos com base nisso
        Cliente::findOrFail($request->id)->update($request->all());

        return redirect()->route('clientListing')->with('success', 'Cliente modificado com sucesso!');
    }
}
