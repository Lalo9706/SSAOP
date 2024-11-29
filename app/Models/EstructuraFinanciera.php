<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstructuraFinanciera extends Model
{
    use HasFactory;
    protected $table = 'estructuras_financieras';
    protected $fillable = 
    [
        'obra_id',
        'tipo_estructura_financiera', // Inversión Aprobada | Inversión Devengada | Inversión Pagada
        'costo_total',
        'fuente_financiamiento',
        'aportacion_municipal',
        'aportacion_beneficiarios',
        'otras_fuentes_federales',
        'otras_fuentes_estatales',
        'otros'
    ];

    /*Relaciones de Pertenencia (Belongs To) - Una Estructura Financiera pertenece a: */

    //Obra
    public function obra(){
        return $this->belongsTo(Obra::class, 'obra_id');
    }
}