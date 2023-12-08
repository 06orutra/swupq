<?php

namespace App\Http\Controllers;

use App\Models\prensa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
/* sigue cambiando*/

class PrensaController extends Controller
{
    public function index()
    {
        $prensas = Prensa::with('seccion')->get();
        return response()->json($prensas);
    }

    public function indexId($id)
{
    $prensa = Prensa::with('seccion')->find($id);

    if (!$prensa) {
        return response()->json(['mensaje' => 'Registro no encontrado'], 404);
    }

    return response()->json($prensa);
}

    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100000', // Asumiendo que manejas la carga de archivos
            'id_seccion' => 'required|integer',
            'fecha_activacion' => 'required|date',  // validating fecha_activacion
            'fecha_desactivacion' => 'nullable|date'  // validating fecha_desactivacion
        ]);

        $date = date('Y-m-d H-i-s');
        // Obtener el nombre de la imagen
        $fotoName = $date . '_' . $request->file('imagen')->getClientOriginalName();
        // Guardar la imagen en storage público
        $fotoPath = $request->file('imagen')->storeAs('public', $fotoName);

        // Crear una nueva instancia de banner
        $prensa = new prensa;
        $prensa->titulo = $request->titulo;
        $prensa->contenido = $request->contenido;
        $prensa->imagen = $fotoName;
        $prensa->id_seccion = $request->id_seccion;

        // Obtener la fecha y hora actuales
        $ahora = now();
        $fechaActivacion = new \Carbon\Carbon($request->fecha_activacion);
        $fechaDesactivacion = $request->fecha_desactivacion ? new \Carbon\Carbon($request->fecha_desactivacion) : null;

        // Comprobar si la fecha y hora actuales están dentro del rango de fecha_activacion y fecha_desactivacion
        if (
            $ahora->greaterThanOrEqualTo($fechaActivacion) &&
            (!$fechaDesactivacion || $ahora->lessThanOrEqualTo($fechaDesactivacion))
        ) {
            $prensa->estado = true;  // Activo
        } else {
            $prensa->estado = false;  // Inactivo
        }

        $prensa->fecha_activacion = $request->fecha_activacion;  // storing fecha_activacion
        $prensa->fecha_desactivacion = $request->fecha_desactivacion;  // storing fecha_desactivacion
        $prensa->save();

        return response()->json('Banner registered successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100000', // Asumiendo que manejas la carga de archivos
            'id_seccion' => 'required|integer',
            'fecha_activacion' => 'required|date',  // validating fecha_activacion
            'fecha_desactivacion' => 'nullable|date'  // validating fecha_desactivacion
        ]);

        $prensa = prensa::find($request->id);



        if ($request->hasFile('imagen')) {

            $date = date('Y-m-d H-i-s');
            //obtener el nombre de la imagen
            $fotoName = $date . '_' . $request->file('imagen')->getClientOriginalName();

            //guardar en public en carpeta img, con el nombre de la imagen de fotoName
            $fotoPath = $request->file('imagen')->storeAs('public', $fotoName);

            // Luego, eliminar la imagen anterior
            if ($prensa->imagen) {
                Storage::delete('public/' . $prensa->imagen);
            }

            $prensa->imagen = $fotoName;
        }

        $ahora = now();
        $fechaActivacion = new \Carbon\Carbon($request->fecha_activacion);
        $fechaDesactivacion = $request->fecha_desactivacion ? new \Carbon\Carbon($request->fecha_desactivacion) : null;

        // Comprobar si la fecha y hora actuales están dentro del rango de fecha_activacion y fecha_desactivacion
        if (
            $ahora->greaterThanOrEqualTo($fechaActivacion) &&
            (!$fechaDesactivacion || $ahora->lessThanOrEqualTo($fechaDesactivacion))
        ) {
            $prensa->estado = true;  // Activo
        } else {
            $prensa->estado = false;  // Inactivo
        }

        $prensa->titulo = $request->titulo;
        $prensa->contenido = $request->contenido;
        $prensa->id_seccion = $request->id_seccion;
        $prensa->fecha_activacion = $request->fecha_activacion;  
        $prensa->fecha_desactivacion = $request->fecha_desactivacion; 
        $prensa->save();

        return response()->json('Banner edited successfully');
    }




    public function destroy(Request $request)
    {
        $prensa = prensa::find($request->id);
        //eliminar la imagen del storage
        Storage::delete('public/' . $prensa->imagen);
        $prensa->delete();

        return response()->json('Banner deleted successfully');
    }



    public function bannerDatafilter()
    {
        $datosBanner = prensa::where('estado', 1)->get();
        return response()->json($datosBanner);
    }



    

}
