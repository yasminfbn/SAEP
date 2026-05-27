<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Destino;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'codigo', 'fabricante','quantidade', 'preco',
        'operadorLogistico', 'destino_id'
    ];

    public function destino(){
        return $this -> belongsTo(Destino::class);
    }
}

