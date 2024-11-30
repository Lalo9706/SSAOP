<?php

namespace App\Http\Controllers;

use App\Models\EntidadFederativa;
use App\Models\FuenteFinanciamiento;
use App\Models\Municipio;
use App\Models\PGI;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PGIController extends Controller
{

    //Mostrar el formulario para la creación de un PGI
    public function create(){
        //Obteniendo los catálogos necesarios
        $fuentesFinanciamiento = FuenteFinanciamiento::all();
        $municipios = Municipio::all();
        //Mostrando la vista con los catálogos de los parametros
        return view('pgis.create', compact('fuentesFinanciamiento', 'municipios',));
    }

    public function store(Request $request): RedirectResponse{
        $formFields = $request->validate([
            'fuente_financiamiento_id' => 'required',
            'municipio_id' => 'required',
            'ejercicio_fiscal' => 'required', 
            'monto_aprobado' => 'required'
        ]);

        $formFields['estado'] = true;
        $lastPGI = PGI::create($formFields);
        return redirect('/')->with('message', '¡PGI registrado con exito!');
    }
}