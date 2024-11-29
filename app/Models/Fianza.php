<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fianza extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'contrato_id',
        'tipo_fianza',
        'nombre_afianzadora',
        'numero_fianza',
        'monto_fianza',
        'clave_seguimiento',
        'ruta_archivo_fianza'
    ];
    
    /*Relaciones de Pertenencia (Belongs To) - Un Contrato pertenece a: */

    //Contrato
    public function contrato(){
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }
}