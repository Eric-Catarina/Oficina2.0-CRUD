<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrcamentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_orcamento' => ['required', Rule::unique('orcamentos')->ignore($this->orcamento)]
            ,'nome_cliente' => ['required']
            ,'data_e_hora_orcamento' => ['required']
            ,'nome_vendedor' => ['required']
            ,'descricao' => ['required']
            ,'valor_orcado' => ['required']
        ];
    }
}
