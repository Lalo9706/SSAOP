<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoAvance extends Model
{
    use HasFactory;
    protected $table = 'fotos_avance';
    protected $fillable = 
    [
        'avance_fisico_id',
        'ruta_archivo_foto'
    ];

    /*Relaciones de Pertenencia (Belongs To) - Una FotoAvance pertenece a: */
    
    //AvanceFisico
    public function avanceFisico(){
        return $this->belongsTo(AvanceFisico::class, 'avance_fisico_id');
    }
}