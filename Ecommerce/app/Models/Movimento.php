<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Movimento extends Model
{
    //colocamos o que é necessario no BD
    protected $fillable = [
        'produto_id', 'quantidade', 'tipo'
    ];
    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id');
    } //relacionamento um para muitos 
}
