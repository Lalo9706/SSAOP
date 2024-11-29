<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;
    protected $table = 'localidades';
    protected  $fillable = ['municipio_id', 'clave_localidad', 'nombre_localidad'];

    /*Relaciones de Pertenencia (Belongs To) */
    //Municipio
    public function municipio(){
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    /*Relaciones de Uno a Muchos (Has Many)*/
    //Obras
    public function obras(){
        return $this->hasMany(Obra::class, 'localidad_id'); 
    }
}