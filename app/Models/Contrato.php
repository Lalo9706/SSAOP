<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'obra_id',
        'contratista_id',
        'numero_contrato',
        'fecha_plazo_inicio',
        'fecha_plazo_termino',
        'ruta_archivo_contrato'
    ];

    /*Relaciones de Pertenencia (Belongs To) - Un Contrato pertenece a: */

    //Obra
    public function obra(){
        return $this->belongsTo(Obra::class, 'obra_id');
    }

    //Contratista
    public function contratista(){
        return $this->belongsTo(Contratista::class, 'contratista_id');
    }

    /*Relaciones de Uno a Muchos (Has Many) - Un Contrato tiene: */
    
    //Fianzas
    public function fianzas(){
        return $this->hasMany(Fianza::class, 'contrato_id'); 
    }
}