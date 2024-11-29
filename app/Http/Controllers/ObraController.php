<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\PGI;
use App\Models\Programa;
use Illuminate\Http\Request;

class ObraController extends Controller
{

    // Obtener todas las Obras y mostrarlas en el index
    public function index()
    {
        return view('obras.index', [
            'obras' => Obra::where('estado', true)->latest()->paginate(4)
        ]);
    }

    //Mostrar la información completa de una obra
    public function show(Obra $obra){
        return view('obras.show', ['obra' => $obra]);
    }

    //Mostrar el formulario para la creación de una Obra
    public function create(){
        //Obteniendo los catálogos necesarios
        $pgis = PGI::with('municipio.localidades')->where('estado', true)->get();
        $programas = Programa::with('subprogramas.tipologias')->get();
        //Mostrando la vista con los catálogos de los parametros
        return view('obras.create', compact('pgis', 'programas',));
    }

}
