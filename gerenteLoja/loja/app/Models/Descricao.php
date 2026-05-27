<?php

namespace App\Models;
use App\Models\Medicamento;
use Illuminate\Database\Eloquent\Model;

class Descricao extends Model
{
    protected $fillable = [
        'codigo_id', 'controlado', 'loteFabricacao', 
        'dataValidade', 'principioAtivo'
    ];

    public function medicamentos(){
        return $this -> hasMany(Medicamento::class);
    }
}