<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'pgi_id',
        'localidad_id',
        'programa_id',
        'subprograma_id',
        'tipologia_id',
        'tipo_obra', //Obra - Acción - Servicio
        'numero_obra',
        'nombre_obra',
        'descripcion_obra',
        'latitud',
        'longitud',
        'zona_alta_prioridad',
        'agebs',
        'grado_rezago_social',
        'situacion_fisica',
        'modalidad_ejecucion',
        'tipo_licitacion',
        'solicitud_obra', //Ruta del archivo de la solicitud
        'estado'
    ];

    /*Relaciones de Pertenencia (Belongs To) - Una Obra pertenece a: */
    
    //PGI
    public function pgi(){
        return $this->belongsTo(PGI::class, 'pgi_id');
    }

    //Programa
    public function programa(){
        return $this->belongsTo(Programa::class, 'programa_id');
    }

    //Subprograma
    public function subprograma(){
        return $this->belongsTo(Subprograma::class, 'subprograma_id');
    }

    //Tipologia
    public function tipologia(){
        return $this->belongsTo(Tipologia::class, 'tipologia_id');
    }

    //Localidad
    public function localidad(){
        return $this->belongsTo(Localidad::class, 'localidad_id');
    }

    /*Relaciones de Uno a Uno - Una Obra tiene un: */

    //ClasificacionFAIS
    public function clasificacionFAIS(){
        return $this->hasOne(ClasificacionFAIS::class, 'obra_id');
    }

    //Contrato
    public function contrato(){
        return $this->hasOne(Contrato::class, 'obra_id');
    }

    /*Relaciones de Uno a Muchos (Has Many) - Una Obra tiene: */
    
    //Metas
    public function metas(){
        return $this->hasMany(Meta::class, 'obra_id'); 
    }

    //EstructurasFinancieras
    public function estructurasFinancieras(){
        return $this->hasMany(EstructuraFinanciera::class, 'obra_id'); 
    }

    //DocumentosIMSS
    public function documentosImss(){
        return $this->hasMany(DocumentoIMSS::class, 'obra_id'); 
    } 

    //AvancesFisicos
    public function avancesFisicos(){
        return $this->hasMany(AvanceFisico::class, 'obra_id'); 
    }

    //AvancesGenerales
    public function avancesGenerales(){
        return $this->hasMany(AvanceGeneral::class, 'obra_id'); 
    }

    //Prefacturas
    public function prefacturas(){
        return $this->hasMany(Prefactura::class, 'obra_id'); 
    }

    //RolesPersonaObra
    public function rolesPersonaObra(){
        return $this->hasMany(RolPersonaObra::class, 'obra_id'); 
    }

    //-------------- ACCESO A DATOS RELACIONADOS -------------------- //
    public function estructuraFinancieraAprobada()
    {
        return $this->hasMany(EstructuraFinanciera::class)->where('tipo_estructura_financiera', 'Inversion Aprobada');
    }

}