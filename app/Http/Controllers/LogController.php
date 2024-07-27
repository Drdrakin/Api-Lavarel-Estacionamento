<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Veiculo;

class LogController extends Controller
{
    public function index()
    {
        // Buscar cores distintas dos veículos
        $cores = Veiculo::select('cor')->distinct()->get();

        //Seleciona todos clientes, até os deletados para registros antigos
        $clients = Cliente::select('*')->get();

        return view('logs.index', compact('cores', 'clients'));
    }

    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $deletado = $request->input('deletado');
        $cor = $request->input('cor');
        $dono = $request->input('dono');

        $clientesQuery = Cliente::query();
        $veiculosQuery = Veiculo::query();

        if ($start_date) {
            $clientesQuery->where('cadastrado', '>=', $start_date);
            $veiculosQuery->where('hora_entrada', '>=', $start_date);
        }

        if ($end_date) {
            $clientesQuery->where('cadastrado', '<=', $end_date);
            $veiculosQuery->where('hora_entrada', '<=', $end_date);
        }

        if ($deletado !== null && $deletado !== '') {
            $clientesQuery->where('deletado', $deletado);
            $veiculosQuery->where('deletado', $deletado);
        }

        if ($cor) {
            $veiculosQuery->where('cor', 'LIKE', '%' . $cor . '%');
        }

        if ($dono) {
            $clientesQuery->where('nome', 'LIKE', '%' . $dono . '%');
            $clientesIds = $clientesQuery->pluck('id');
            $veiculosQuery->whereIn('id_cliente', $clientesIds);
        }

        $clients = Cliente::select('*')->get();

        $clientes = $clientesQuery->get();
        $veiculos = $veiculosQuery->get();
        $cores = Veiculo::select('cor')->distinct()->get();

        return view('logs.index', compact('clientes', 'veiculos', 'cores', 'clients'));
    }
}
