<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'nombres',
        'apellido_paterno',
        'apellido_materno'
    ];

    /*Relaciones de Uno a Muchos - Una Persona tiene: */

    //RolPersonaObra
    public function rolPersonaObra(){
        return $this->hasMany(RolPersonaObra::class, 'rol_persona_obra_id');
    }
}