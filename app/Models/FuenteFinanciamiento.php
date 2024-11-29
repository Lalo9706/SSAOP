<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuenteFinanciamiento extends Model
{
    use HasFactory;
    protected $table = 'fuentes_financiamiento';
    protected  $fillable = ['clave_fondo', 'nombre_fondo'];
  
    //Relación entre el modelo PGI
    public function pgis(){
        return $this->hasMany(PGI::class, 'fuente_financiamiento_id');
    }
}