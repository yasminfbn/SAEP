<?php

namespace App\Models;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $fillable = [
        'produto_id',
        'tipo',
        'quantidade',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}