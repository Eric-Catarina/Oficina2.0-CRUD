<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;

    protected $fillable = ['id_orcamento','nome_cliente','data_e_hora_orcamento','nome_vendedor','descricao','valor_orcado'];

}
