<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Categoria extends Model
{
    protected $fillable = [
        'codigo_id', 'categoria'
    ];

    public function produtos(){
        return $this -> hasMany(Produto::class);
    }
}
