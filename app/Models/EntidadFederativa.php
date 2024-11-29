<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntidadFederativa extends Model
{
    use HasFactory;
    protected $table = 'entidades_federativas';
    protected $fillable = ['clave_entidad', 'nombre_entidad'];

    /*Relaciones de Uno a Muchos (Has Many)*/
    //Municipios
    public function municipios(){
        return $this->hasMany(Municipio::class, 'entidad_federativa_id'); // Esta nomenclatura de ids la interpreta Laravel y le permite hallar las relaciones de forma automatica, sin necesidad de ponerle un nombre al id de los Modelos
    }
}