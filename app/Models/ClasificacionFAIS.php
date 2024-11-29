<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasificacionFAIS extends Model
{
    use HasFactory;
    protected $table = 'clasificacion_fais';
    protected $fillable = 
    [
        'obra_id',
        'clasificacion_proyecto',
        'subclasificacion_proyecto',
        'modalidad_proyecto',
        'contribucion_carencia_social',
        'tipo_contribucion'
    ];

    //Relación de pertenencia con modelo Obra
    public function obra(){
        return $this->belongsTo(Obra::class, 'obra_id');
    }
}