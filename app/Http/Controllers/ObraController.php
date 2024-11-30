<?php

namespace App\Http\Controllers;

use App\Models\EstructuraFinanciera;
use App\Models\Meta;
use App\Models\Obra;
use App\Models\PGI;
use App\Models\Programa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    //Almacenar una Obra su Estructura Financiera y Metas
    public function store(Request $request): RedirectResponse{
        DB::beginTransaction(); //Comenzar transacción
        try{
            //Validar campos de Obra
            $formFields_obra = $request->validate([
                'pgi_id' => 'required',
                'localidad_id' => 'required',
                'programa_id' => 'required',
                'subprograma_id' => 'required',
                'tipologia_id' => 'required',
                'tipo_obra' => 'required',
                'numero_obra' => 'required',
                'nombre_obra' => 'required',
                'descripcion_obra' => 'required',
                'latitud' => 'required',
                'longitud' => 'required',
                'zona_alta_prioridad' => 'required',
                'agebs' => 'required',
                'grado_rezago_social' => 'required',
                'modalidad_ejecucion' => 'required',
                'tipo_licitacion' => 'required',
                'solicitud_obra' => ['file', 'mimes:pdf,doc,docx', 'max:2048']
            ]);

            //Asignando valores constantes a la Obra
            $formFields_obra['situacion_fisica'] = 'N/D';
            $formFields_obra['estado'] = true;

            //Almacenando el archivo de la solicitud de obra y asignando el valor de la ruta
            if ($request->hasFile('solicitud_obra')) {
                $formFields_obra['solicitud_obra'] = $request->file('solicitud_obra')->store('solicitudes_obras', 'public');
            }else{ $formFields_obra['solicitud_obra'] = 'N/D'; }
            
            //Almacenando la Obra
            $lastObra = Obra::create($formFields_obra); //Almacenar la Obra en la base de datos y obtener su registro        
            
            //Validar campos de Estructura Financiera
            $formFields_EstructuraFinanciera = $request->validate([
                'costo_total' => 'required',
                'fuente_financiamiento' => 'required',
                'aportacion_municipal' => 'required',
                'aportacion_beneficiarios' => 'required',
                'otras_fuentes_federales' => 'required',
                'otras_fuentes_estatales' => 'required',
                'otros' => 'required'
            ]);

            // Asignando el id de la Obra almacenada y el valor constante
            $formFields_EstructuraFinanciera['obra_id'] = $lastObra->id;
            $formFields_EstructuraFinanciera['tipo_estructura_financiera'] = 'Inversion Aprobada';

            EstructuraFinanciera::create($formFields_EstructuraFinanciera); //Almacenar la Estructura Financiera en la base de datos y obtener su registro

            // Validar campos de Meta de proyecto
            $formFields_Meta_Proyecto = $request->validate([
                'unidad_medida_proyecto' => 'required',
                'cantidad_aprobada_proyecto' => 'required'
            ]);

            // Crear Meta de Proyecto
            Meta::create([
                'obra_id' => $lastObra->id,
                'tipo_meta' => 'Proyecto',
                'unidad_medida' => $formFields_Meta_Proyecto['unidad_medida_proyecto'],
                'cantidad_aprobada' => $formFields_Meta_Proyecto['cantidad_aprobada_proyecto'],
            ]);

            // Validar campos de Meta de beneficiarios
            $formFields_Meta_Beneficiario = $request->validate([
                'unidad_medida_beneficiarios' => 'required',
                'cantidad_aprobada_beneficiarios' => 'required'
            ]);

            // Crear Meta de Beneficiarios
            Meta::create([
                'obra_id' => $lastObra->id,
                'tipo_meta' => 'Beneficiarios',
                'unidad_medida' => $formFields_Meta_Beneficiario['unidad_medida_beneficiarios'],
                'cantidad_aprobada' => $formFields_Meta_Beneficiario['cantidad_aprobada_beneficiarios'],
            ]);

            DB::commit(); //Enviar transacción

            return redirect('/dashboard')->with('message', '¡Se ha registrado la obra!');

        }catch (\Exception $e) {
            // Si ocurre algún error, se revierte la transacción
            //dd($e);
            DB::rollBack();
            return redirect()->back()->with('message', 'Ha ocurrido un error: Intentelo nuevamente');
        }
    }
}
