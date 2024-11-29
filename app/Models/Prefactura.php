<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefactura extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'tipo_pago', // Anticipo | Estimación 01 | Estimación 02 | Estimación 03
        'importe',
        'montoIVA', // Importe x 0.016
        'total', // Importe + Monto IVA
        'cinco_al_millar', // Importe x 0.005
        'amortizacion_anticipo', //
        'neto', // Total – Cinco al Millar
        'ruta_archivo_factura'
    ];

    /*Relaciones de Pertenencia (Belongs To) - Una Prefactura pertenece a: */
    
    //Obra
    public function obra(){
        return $this->belongsTo(Obra::class, 'obra_id');
    }

    /*Relaciones de Uno a Uno - Una Prefactura tiene un: */

    //OrdenPago
    public function ordenPago(){
        return $this->hasOne(OrdenPago::class, 'prefactura_id');
    }
}