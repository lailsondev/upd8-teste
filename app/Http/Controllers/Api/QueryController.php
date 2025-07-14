<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Cidade;
use App\Models\Representante;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function getRepresentantesByCliente(string $clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);

        $representantes = Representante::where('cidade_id', $cliente->cidade_id)
                                     ->with('cidade')
                                     ->get();
                                     
        return response()->json($representantes, 200);
    }

    public function getRepresentantesByCidade(string $cidadeId)
    {
        $cidade = Cidade::findOrFail($cidadeId);

        $representantes = Representante::where('cidade_id', $cidadeId)
                                     ->with('cidade')
                                     ->get();
        
        return response()->json($representantes, 200);
    }
}