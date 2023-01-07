<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Http\Requests\StoreOrcamentoRequest;

class OrcamentoController extends Controller
{
    
    public function index()
    {
        return response()-> json("Index Orcamento");
    }    

    public function store(StoreOrcamentoRequest $request)
    {
        Orcamento::create($request->validated());
        return response()->json("Orçamento criado!");
    }
    
}