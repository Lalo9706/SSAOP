<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected  $fillable = ['entidad_federativa_id', 'clave_municipio', 'nombre_municipio'];

    /*Relaciones de Pertenencia (Belongs To) - Un Municipio pertenece a: */
    
    //EntidadFederativa
    public function entidadFederativa(){
        return $this->belongsTo(EntidadFederativa::class, 'entidad_federativa_id');
    }

    /*Relaciones de Uno a Muchos (Has Many) - Un Municipio tiene: */
    
    //Localidades
    public function localidades(){
        return $this->hasMany(Localidad::class, 'municipio_id');
    }
    
    //PGI
    public function pgis(){
        return $this->hasMany(PGI::class, 'municipio_id'); // Esta nomenclatura de ids la interpreta Laravel y le permite hallar las relaciones de forma automatica, sin necesidad de ponerle un nombre al id de los Modelos
    }    
}