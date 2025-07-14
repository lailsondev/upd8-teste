<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Cidade::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCidadeRequest $request)
    {
        $validatedData = $request->validated();

        $cidade = Cidade::create($validatedData);

        return response()->json($cidade, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cidade = Cidade::findOrFail($id);

        return response()->json($cidade, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCidadeRequest $request, Cidade $cidade)
    {
        $validatedData = $request->validated();

        $cidade->update($validatedData);

        return response()->json($cidade, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cidade $cidade)
    {
        $cidade->delete();

        return response()->json(null, 204);
    }
}