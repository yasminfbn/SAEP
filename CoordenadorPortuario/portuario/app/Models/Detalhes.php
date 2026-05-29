<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Detalhes extends Model
{
    protected $fillable = [
        'codigo', 'tamanho', 'tipo_carga', 'nome_navio'
    ];

    public function produtos(){
        return $this -> belongsTo(Produto::class);
    }
}
