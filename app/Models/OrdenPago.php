<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenPago extends Model
{
    use HasFactory;
    protected $table = 'ordenes_pago';
    protected $fillable = ['prefactura_id', 'numero_factura', 'ruta_archivo_orden_pago'];

    /*Relaciones de Pertenencia (Belongs To) - Una OrdenPago pertenece a: */
    
    //Prefactura
    public function prefactura(){
        return $this->belongsTo(Prefactura::class, 'prefactura_id');
    }
}