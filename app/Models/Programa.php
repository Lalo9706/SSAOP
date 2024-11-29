<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected  $fillable = ['clave_programa', 'nombre_programa'];

    /*Relaciones de Uno a Muchos (Has Many)*/
    //Subprograma
    public function subprogramas(){
        return $this->hasMany(Subprograma::class, 'programa_id');
    }

    //Obras
    public function obras(){
        return $this->hasMany(Obra::class, 'programa_id');
    }
}