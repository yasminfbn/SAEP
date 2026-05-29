<?php

namespace App\Models;
use App\Models\Descricao;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'codigo', 'fabricante','quantidade', 'preco'
    ];

    public function descricao(){
        return $this -> belongsTo(Descricao::class);
    }
}
