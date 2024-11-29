<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipologia extends Model
{
    use HasFactory;
    protected  $fillable = ['subprograma_id', 'clave_tipologia', 'nombre_tipologia'];

    /*Relaciones de Pertenencia (Belongs To) - Una Tipologia pertenece a: */
    
    //Subprograma
    public function subprograma(){
        return $this->belongsTo(Subprograma::class, 'subprograma_id');
    }

    /*Relaciones de Uno a Muchos (Has Many)* - Una Tipologia tiene: */
    //Obras
    public function obras(){
        return $this->hasMany(Obra::class, 'tipologia_id');
    }

}