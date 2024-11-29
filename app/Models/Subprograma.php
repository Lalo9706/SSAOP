<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subprograma extends Model
{
    use HasFactory;
    protected  $fillable = ['programa_id', 'clave_subprograma', 'nombre_subprograma'];

    /*Relaciones de Pertenencia (Belongs To) */
    //Programa
    public function programa(){
        return $this->belongsTo(Programa::class, 'programa_id');
    }

/*Relaciones de Uno a Muchos (Has Many)*/

    //Tipologias
    public function tipologias(){
        return $this->hasMany(Tipologia::class, 'subprograma_id');
    }

    //Obras
    public function obras(){
        return $this->hasMany(Obra::class, 'subprograma_id');
    }
}