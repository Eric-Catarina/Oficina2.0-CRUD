<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Http\Requests\StoreOrcamentoRequest;
use App\Http\Resources\V1\OrcamentoResource;
use App\Http\Resources\V1\OrcamentoCollection;


class OrcamentoController extends Controller
{
    
    public function index()
    {
        return new OrcamentoCollection(Orcamento::paginate(1));
    }    

    public function store(StoreOrcamentoRequest $request)
    {
        Orcamento::create($request->validated());
        return response()->json("Orçamento criado!");
    }

    public function update(StoreOrcamentoRequest $request, Orcamento $orcamento)
    {
        $orcamento->update($request->validated());
        return response()->json("Orçamento atualizado!");
    }

    public function show(Orcamento $orcamento)
    {
        return new OrcamentoResource($orcamento);
    }
    
    public function destroy(Orcamento $orcamento)
    {
        $orcamento->delete();
        return response()->json("Orcamento deletado!");
    }
}