<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Descricao;
class Medicamento extends Model
{
    protected $fillable = [
        'codigo', 'nome', 'fabricante', 
        'quantidade', 'preco'
    ];

    public function medicamentos(){
        return $this ->belongsTo(Descricao::class);
    }
}
