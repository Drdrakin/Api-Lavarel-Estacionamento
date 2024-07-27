<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;  
use App\Models\Veiculo;
use Illuminate\Http\RedirectResponse;

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

        $clients = Cliente::where('deletado', false)->get(); // Filtra apenas pelos clientes não deletados

        return view('vehicleSignup', 
        [
            'clients'=>$clients
        ]);
    }

    public function store(Request $request){

        //Variável instanciando a classe 'Veiculo' que é o Model utilizado pelo laravel
        $veiculo = new Veiculo;

        //Aqui, a primeira parte eu especifico a tabela e o campo, enquanto na segunda a propriedade da request, que vem com vários itens e
        //é um objeto.
        //Dando nome aos termos, os dois são referencias de propriedades de um objeto, o primeiro sendo o obj da Model e o segundo da Request
        $veiculo->placa = $request->placa;
        $veiculo->modelo = $request->modelo;
        $veiculo->cor = $request->cor;
        $veiculo->id_cliente = $request->id_cliente;

        //O método save() é responsável por salvar os dados no banco
        //Observo que aqui seria agradável tratamentos de erro se isso fosse um sistema melhor antes de tentar realizar a query.
        $veiculo->save();

        return redirect()->route('listVehicles')->with('success', 'Veículo cadastrado com sucesso!');
    }

    public function destroy($id){

        $veiculo = Veiculo::findOrFail($id);

        $veiculo->deletado = 1;

        $veiculo->save();

        return redirect()->route('listVehicles')->with('success', 'Veículo excluído com sucesso!');
    }

    public function edit($id){

        $veiculo = Veiculo::findOrFail($id);

        $clients = Cliente::select('*')->get();
        
        //Query para encontrar a linha do dono da tabela, não retorna como uma propriedade e sim um objeto para maior flexibilidade, 
        //portanto é necessário ->nome na view 
        $owner = Cliente::where('id', $veiculo->id_cliente)->first();

        return view('editVehicle', ['veiculo'=>$veiculo, 'clients'=>$clients, 'owner'=>$owner]);
    }

    public function update(Request $request){

        Veiculo::findOrFail($request->id)->update($request->all());

        return redirect()->route('listVehicles')->with('success', 'Veículo modificado com sucesso!');
    }
}
