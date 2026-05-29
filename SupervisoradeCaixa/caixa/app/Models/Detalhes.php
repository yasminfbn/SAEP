<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Detalhes extends Model
{
    protected $fillable = [
        'codigo','nome_acessorio', 'modelo_aparelho', 'cor', 'material', 'possui_garantia'
    ];

    public function produtos(){
        return $this -> belongsTo(Produto::class);
    }
}
