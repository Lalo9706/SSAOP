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
        //dd($request->all());
        DB::beginTransaction();
        try{
            //Registro de Obra
            //Validar campos de Obra
            $formFields_Obra = $request->validate([
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
                'solicitud_obra' => ['file', 'mimes:pdf,doc,docx', 'max:2048'],
                'estado' => 'required'
            ]);

            //Asignando valor constante
            $formFields_Obra['situacion_fisica'] = 'N/D';

            //Almacenando el archivo y asignando el valor de la ruta
            if ($request->hasFile('solicitud_obra')) {
                $formFields_Obra['solicitud_obra'] = $request->file('solicitud_obra')->store('solicitudes_obras', 'public');
            }

            //Almacenando Obra
            $lastObra = Obra::create($formFields_Obra); //Almacenar la Obra en la base de datos y obtener su registro

            // Registro de Estructura Financiera
            //Validar campos de Estructura Financiera
            $formFields_EstructuraFinanciera = $request->validate([
                'costo_total' => 'required',
                'fuente_financiamiento' => 'required',
                'aportacion_municipal' => 'nullable',
                'aportacion_beneficiarios' => 'nullable',
                'otras_fuentes_federales' => 'nullable',
                'otras_fuentes_estatales' => 'nullable',
                'otros' => 'nullable'
            ]);

            // Asignando los valores constantes a las variables
            $formFields_EstructuraFinanciera['obra_id'] = $lastObra->id;
            $formFields_EstructuraFinanciera['tipo_estructura_financiera'] = 'Inversion Aprobada';

            EstructuraFinanciera::create($formFields_EstructuraFinanciera); //Almacenar la Estructura Financiera en la base de datos y obtener su registro

            // Lógica para el registro de Metas
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

            //DB::commit(); //Enviar transacción

            return redirect('/')->with('message', '¡Se ha registrado la obra!');
            

        }catch (\Exception $e) {
            // Si ocurre algún error, se revierte la transacción
            DB::rollBack();
    
            // Opción para manejar el error
            return redirect()->back()->withErrors(['error' => 'Ocurrió un error y no se guardó el registro, intente nuevamente']);
        }
    }
}
