<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PGI extends Model
{
    use HasFactory;
    protected $table = 'pgis';
    protected  $fillable = 
    [
        'fuente_financiamiento_id',
        'municipio_id',
        'ejercicio_fiscal', 
        'monto_aprobado',
        'estado'
    ];
  
    /*Relaciones de Pertenencia (Belongs To) */
    //Municipio
    public function municipio(){
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    //FuenteFinanciamiento
    public function fuenteFinanciamiento(){
        return $this->belongsTo(FuenteFinanciamiento::class, 'fuente_financiamiento_id');
    }

    /*Relaciones de Uno a Muchos (Has Many)*/
    //Obras
    public function obras(){
        return $this->hasMany(Obra::class, 'pgi_id');
    }
}