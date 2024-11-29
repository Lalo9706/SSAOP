<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratista extends Model
{
    use HasFactory;
    protected $fillable = 
    [];

    /*Relaciones de Uno a Muchos (Has Many) - Un Contratista tiene: */
    
    //Contrato
    public function metas(){
        return $this->hasMany(Contrato::class, 'contratista_id'); 
    }
}