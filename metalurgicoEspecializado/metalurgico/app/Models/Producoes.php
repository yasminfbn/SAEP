<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producoes extends Model
{
    protected $fillable = [ 
        'produto_id', 'data', 'operador', 'forno', 'temperatura_registrada',
        'quantidade_produzida'
    ];

    public function produtos(){
        return $this -> hasMany(Produtos::class);
    }
}
