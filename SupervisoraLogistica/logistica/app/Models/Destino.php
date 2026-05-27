<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Destino extends Model
{
    protected $fillable = [
        'destino'
    ];

    public function produtos(){
        return $this -> hasMany(Produto::class);
    }
}
