<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'obra_id',
        'tipo_meta', //Proyecto | Beneficiario
        'unidad_medida',
        'cantidad_aprobada',
        'cantidad_alcanzada'
    ];

    /*Relaciones de Pertenencia (Belongs To) - Una Meta pertenece a: */
    
    //Obra
    public function obra(){
        return $this->belongsTo(Obra::class, 'obra_id');
    }
}