<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = [ 
        'nome', 'codigo', 'fabricante', 'preco', 'quantidade',
        'categoria', 'tipo_liga', 'ponto_fusao', 'peso_toneladas',
        'CA', 'validade'
    ];

    public function producoes(){
        return $this -> belongsTo(Producoes::class);
    }
}
