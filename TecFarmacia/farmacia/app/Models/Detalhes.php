<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Detalhes extends Model
{
    protected $fillable = [
        'codigo', 'periculosidade', 'temperatura', 'volume'
    ];
    public function produtos(){
        return $this -> belonsTo(Produto::class);
    }
}
