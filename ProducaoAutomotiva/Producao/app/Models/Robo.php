<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
class Robo extends Model
{
    protected $fillable = [
        'modelo', 'fabricante', 'descricao'
    ];
    public function produto()
    {
        return $this->hasMany(Produto::class);
    }

}
