<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Get
    public function index()
    {
    $carreras = Carrera::all();
    $carreras = $carreras->map(function ($carrera) {
        $carrera->datos = json_decode($carrera->datos);
        return $carrera;
    });

    return view('data', compact('carreras'));
    }

    //Fornmulario
    public function myform()
    {
        return view('form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Consulta 
        $nombre = $request->input('nombre');
        $plan_estudios = $request->input('plan_estudios');
        $vision = $request->input('vision');
        $mision = $request->input('mision');
        $url_imagen = $request->input('url_imagen');
        $inicio = $request->input('inicio');
        // Acceder a los colores como un arreglo
        $colores = $request->input('colores');

        $datos = [
            "nombre_carrera" => $nombre,
            "colores" => [],
            "objetivos" => [
                "plan_estudios" => $plan_estudios,
                "vision" => $vision,
                "mision" => $mision,
                "url_imagen" => $url_imagen
            ],
            "inicio" => $inicio
        ];

         // Agregar colores al arreglo dinámicamente
        foreach ($colores as $index => $color) {
        $datos["colores"]["color_" . ($index + 1)] = $color;
        }

        $json = json_encode($datos, JSON_UNESCAPED_SLASHES);
       
        //Guardar en la base de datos
        $carrera = new Carrera();
        $carrera->datos = $json;
        $carrera->save();
        //Retorna el json en una ruta especifica /johnson
        return redirect('carrera');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carrera = Carrera::find($id);
        return response()->json($carrera);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carrera = Carrera::find($id);
        $carrera->datos = json_decode($carrera->datos);
    
        return view('updateform', compact('carrera'));
    }

    public function update(Request $request, string $id)
    {
        // Obtén la carrera existente por su ID
        $carrera = Carrera::find($id);

        if ($carrera) {
            // Obten los datos JSON actuales y decódificalos
            $datos = json_decode($carrera->datos, true);

            // Actualiza los campos según la solicitud
            $datos['nombre_carrera'] = $request->input('nombre');
            $datos['objetivos']['plan_estudios'] = $request->input('plan_estudios');
            $datos['objetivos']['vision'] = $request->input('vision');
            $datos['objetivos']['mision'] = $request->input('mision');
            $datos['objetivos']['url_imagen'] = $request->input('url_imagen');
            $datos['inicio'] = $request->input('inicio');
            $colores = $request->input('colores');

            // Reemplazar todos los colores existentes con los nuevos colores
            $datos['colores'] = [];

            foreach ($colores as $index => $color) {
                $datos['colores']["color_" . ($index)] = $color;
            }

            // Codifica los datos actualizados nuevamente en formato JSON
            $json = json_encode($datos, JSON_UNESCAPED_SLASHES);

            // Actualiza el campo 'datos' en la base de datos
            $carrera->datos = $json;
            $carrera->save();

            // Redirecciona a la vista de datos
            return redirect('data');
        } else {
            return response()->json(['error' => 'Carrera no encontrada'], 404);
        }
    }

    public function carreras_disponibles(){

        $carreras = Carrera::all();

        return response()->json($carreras);
    }

    public function guardar(Request $request){
        /*
        $datos = [
            "nombre_carrera" => $request->nombre,
            "colores" => [],
            "objetivos" => [
                "plan_estudios" => $plan_estudios,
                "vision" => $vision,
                "mision" => $mision,
                "url_imagen" => $url_imagen
            ],
            "perfil_egreso"=>$request->perfil_egreso,
            "inicio" => $inicio
        ];
        */
        /*
        // Agregar colores al arreglo dinámicamente
        foreach ($colores as $index => $color) {
        $datos["colores"]["color_" . ($index + 1)] = $color;
        }
        */

        $datos = [
            'nombre_carrera' => $request->nombre,  
            'colores' => $request->colores,
            'objetivos_carrera'=> $request->objetivos_carrera,
            'perfil_ingreso' => $request->perfil_ingreso,
            'plan_estudios_folleto_digital' => $request->plan_estudios_folleto_digital,
            'perfil_egreso' => $request->perfil_egreso,   
            'ciclos_formacion'=> $request->ciclos_formacion,
            'pagina_principal' => $request->pagina_principal,
        ];

        $json = json_encode($datos, JSON_UNESCAPED_SLASHES);
       
        //Guardar en la base de datos
        $carrera = new Carrera();
        $carrera->datos = $json;
        $carrera->save();

        return response()->json("Se proceso la carrera exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carrera = Carrera::find($id);
        $carrera->delete();
        //retorna de nuevo a la vista de datos
        return redirect('data');
    }
}