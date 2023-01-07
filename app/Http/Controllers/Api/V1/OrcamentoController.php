<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Orcamento;


class OrcamentoController extends Controller
{
    
    public function index()
    {
        return response()-> json("Index Orcamento");
    }    

    public function store(StoreOrcamentoRequest $request)
    {
        orcamento::create($request->validated());
        return response->json("Orçamento criado!");
    }
    
}