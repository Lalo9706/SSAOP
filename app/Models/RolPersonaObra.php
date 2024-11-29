<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPersonaObra extends Model
{
    use HasFactory;
    protected $table = 'roles_personas_obras';
    protected $fillable = 
    [
        'obra_id',
        'persona_id',
        'tipo_rol',
        'rol',
        'ruta_archivo_identificacion' //Fotografía
    ];

    /*Relaciones de Pertenencia (Belongs To) - Un RolPersonaObra pertenece a: */
    
    //Obra
    public function obra(){
        return $this->belongsTo(Obra::class, 'obra_id');
    }

    //Obra
    public function persona(){
        return $this->belongsTo(Persona::class, 'persona_id');
    }


}