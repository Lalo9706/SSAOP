<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoIMSS extends Model
{
    use HasFactory;
    protected $table = 'documentos_imss';
    protected $fillable = 
    [
        'obra_id',
        'fecha_registro',
        'folio_acuse',
        'tipo_documento',
        'ruta_archivo_imss'
    ];

    /*Relaciones de Pertenencia (Belongs To) - Un DocumentoIMSS pertenece a: */

    //Obra
    public function obra(){
        return $this->belongsTo(Obra::class, 'obra_id');
    }
}