<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Robo;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'codigo', 'fabricante', 'preco', 'quantidade',
        'numero_serie', 'vida_util_horas', 'localizacao', 'robo_id'
    ];

    public function robo(){
        return $this -> belongsTo(Robo::class);
    }
}
