<?php

namespace App\Models;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Model;

class Descricao extends Model
{
    protected $fillable = [
        'marca', 'codigo', 'estoqueMinimo','medida'
    ];

    public function produtos(){
        return $this -> hasMany(Produto::class);
    }
}

