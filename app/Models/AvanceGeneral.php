<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvanceGeneral extends Model
{
    use HasFactory;
    protected $table = 'avances_generales';
    protected $fillable = 
    [
        'obra_id',
        'tipo_avance',
        'fecha_real_inicio',
        'fecha_real_termino',
        'porcentaje_avance'
    ];

    /*Relaciones de Pertenencia (Belongs To) - Un AvanceGeneral pertenece a: */
    
    //Obra
    public function obra(){
        return $this->belongsTo(Obra::class, 'obra_id');
    }
}