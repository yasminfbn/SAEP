<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'codigo', 'fabricante', 'validade',
        'quantidade', 'preco', 'temperatura','categoria_id'
    ];

    public function categoria(){
        return $this -> belongsTo(Categoria::class);
    }
}

