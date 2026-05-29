<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Detalhes;
class Produto extends Model
{
    protected $fillable = [
        'nome', 'codigo', 'fabricante', 'quantidade', 'preco'
    ];

    public function detalhes(){
        return $this -> hasMany(Detalhes::class);
    }
}
