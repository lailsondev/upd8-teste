<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRepresentanteRequest;
use App\Http\Requests\UpdateRepresentanteRequest;
use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Representante;
use Illuminate\Validation\Rule; // Mantenha esta linha

class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Representante::with('cidade');

        if ($request->has('cidade_id')) {
            $query->where('cidade_id', $request->input('cidade_id'));
        }

        $representantes = $query->paginate(10);
        return response()->json($representantes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRepresentanteRequest $request)
    {
        $validated = $request->validated();

        $representante = Representante::create($validated);
        return response()->json($representante, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Representante $representante)
    {
        $representante->load('cidade');

        return response()->json($representante);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepresentanteRequest $request, Representante $representante)
    {
        $validated = $request->validated();

        $representante->update($validated);
        return response()->json($representante);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Representante $representante)
    {
        $representante->delete();

        return response()->json(null, 204);
    }
}