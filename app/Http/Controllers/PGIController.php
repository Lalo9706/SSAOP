<?php

namespace App\Http\Controllers;

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
            'monto_aprobado' => [
            'required',
            'numeric',
            'regex:/^\d{1,8}(\.\d{1,2})?$/', // Hasta 8 dígitos enteros y 2 decimales
            ],[
                'monto_aprobado.required' => 'Por favor, ingresa un monto aprobado.',
                'monto_aprobado.numeric' => 'El monto debe ser un número.',
                'monto_aprobado.max' => 'El monto no puede ser mayor a 99,999,999.99.',
                'monto_aprobado.regex' => 'El monto aprobado debe tener como máximo 8 dígitos enteros y 2 decimales.',
            ]
        ]);

        $formFields['estado'] = true;
        PGI::create($formFields);
        return redirect('/')->with('message', '¡PGI registrado con exito!');
    }
}