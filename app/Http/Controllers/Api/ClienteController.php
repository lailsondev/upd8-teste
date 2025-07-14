<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
// Removida a linha 'use Illuminate\Validation\ValidationException;', pois o Laravel
// tratará a exceção automaticamente sem a necessidade de um try-catch explícito.
use Illuminate\Validation\Rule; // Mantenha esta linha

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Cliente::with('cidade');

        if ($request->has('cpf')) {
            $query->where('cpf', 'like', '%' . $request->input('cpf') . '%');
        }
        if ($request->has('nome')) {
            $query->where('nome', 'like', '%' . $request->input('nome') . '%');
        }
        if ($request->has('data_nascimento')) {
            $query->whereDate('data_nascimento', $request->input('data_nascimento'));
        }
        if ($request->has('sexo')) {
            $query->where('sexo', $request->input('sexo'));
        }
        if ($request->has('estado')) {
            $query->whereHas('cidade', function ($q) use ($request) {
                $q->where('estado', $request->input('estado'));
            });
        }
        if ($request->has('cidade_id')) {
            $query->where('cidade_id', $request->input('cidade_id'));
        }

        $clientes = $query->paginate(10);
        return response()->json($clientes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $validated = $request->validated();

        $cliente = Cliente::create($validated);
        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::with('cidade')->findOrFail($id);

        return response()->json($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $validated = $request->validated();

        $cliente->update($validated);
        return response()->json($cliente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();
        return response()->json(null, 204);
    }
}