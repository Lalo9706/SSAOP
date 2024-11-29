<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvanceFisico extends Model
{
    use HasFactory;
    protected $table = 'avances_fisicos';
    protected $fillable = 
    [
        'obra_id',
        'descripcion_avance',
        'fecha_avance'
    ];

    /*Relaciones de Pertenencia (Belongs To) - Un AvanceFisico pertenece a: */

    //Obra
    public function obra(){
        return $this->belongsTo(Obra::class, 'obra_id');
    }

    /*Relaciones de Uno a Muchos (Has Many) - Un AvanceFisico tiene: */
    
    //FotosAvance
    public function fotosAvance(){
        return $this->hasMany(FotoAvance::class, 'avance_fisico_id'); 
    }
}