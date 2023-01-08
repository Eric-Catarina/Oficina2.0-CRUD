<?php

namespace App\Http\Resources\V1;

use App\Http\Controllers\Api\V1\OrcamentoController;

use Illuminate\Http\Resources\Json\JsonResource;

class OrcamentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_orcamento' => $this->id,
            'nome_cliente' => $this->nome_cliente,

            'rota' => route('orcamento.show', $this->id)
        ];
    }
}
