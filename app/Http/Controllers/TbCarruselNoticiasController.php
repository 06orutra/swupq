<?php

namespace App\Http\Controllers;

use App\Models\tb_carrusel_noticias;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TbCarruselNoticiasController extends Controller
{
    public function bannerData()
    {
        $datosBanner = tb_carrusel_noticias::all();
        return response()->json($datosBanner);
    }

    public function bannerDatafilter()
    {
        $datosBanner = tb_carrusel_noticias::where('estado', 1)->get();
        return response()->json($datosBanner);
    }


    public function registrarBanner(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
            'fecha_activacion' => 'required|date',  // validating fecha_activacion
            'fecha_desactivacion' => 'nullable|date'  // validating fecha_desactivacion
        ]);

        $date = date('Y-m-d H-i-s');
        // Obtener el nombre de la imagen
        $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();
        // Guardar la imagen en storage público
        $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

        // Crear una nueva instancia de banner
        $banner = new tb_carrusel_noticias;
        $banner->nombre = $request->nombre;
        $banner->link = $request->link;
        $banner->imagen = $fotoName;

        // Obtener la fecha y hora actuales
        $ahora = now();
        $fechaActivacion = new \Carbon\Carbon($request->fecha_activacion);
        $fechaDesactivacion = $request->fecha_desactivacion ? new \Carbon\Carbon($request->fecha_desactivacion) : null;

        // Comprobar si la fecha y hora actuales están dentro del rango de fecha_activacion y fecha_desactivacion
        if (
            $ahora->greaterThanOrEqualTo($fechaActivacion) &&
            (!$fechaDesactivacion || $ahora->lessThanOrEqualTo($fechaDesactivacion))
        ) {
            $banner->estado = true;  // Activo
        } else {
            $banner->estado = false;  // Inactivo
        }

        $banner->fecha_activacion = $request->fecha_activacion;  // storing fecha_activacion
        $banner->fecha_desactivacion = $request->fecha_desactivacion;  // storing fecha_desactivacion
        $banner->save();

        return response()->json('Banner registered successfully');
    }

    public function editarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
            //'estado' => 'required|boolean',  // validating estado
            'fecha_activacion' => 'required|date',  // validating fecha_activacion
            'fecha_desactivacion' => 'nullable|date'  // validating fecha_desactivacion
        ]);

        $banner = tb_carrusel_noticias::find($request->id);



        if ($request->hasFile('foto')) {

            $date = date('Y-m-d H-i-s');
            //obtener el nombre de la imagen
            $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();

            //guardar en public en carpeta img, con el nombre de la imagen de fotoName
            $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

            // Luego, eliminar la imagen anterior
            if ($banner->imagen) {
                Storage::delete('public/' . $banner->imagen);
            }

            $banner->imagen = $fotoName;
        }

        $ahora = now();
        $fechaActivacion = new \Carbon\Carbon($request->fecha_activacion);
        $fechaDesactivacion = $request->fecha_desactivacion ? new \Carbon\Carbon($request->fecha_desactivacion) : null;

        // Comprobar si la fecha y hora actuales están dentro del rango de fecha_activacion y fecha_desactivacion
        if (
            $ahora->greaterThanOrEqualTo($fechaActivacion) &&
            (!$fechaDesactivacion || $ahora->lessThanOrEqualTo($fechaDesactivacion))
        ) {
            $banner->estado = true;  // Activo
        } else {
            $banner->estado = false;  // Inactivo
        }

        $banner->nombre = $request->nombre;
        $banner->link = $request->link;
        //$banner->estado = $request->estado;  // storing estado
        $banner->fecha_activacion = $request->fecha_activacion;  // storing fecha_activacion
        $banner->fecha_desactivacion = $request->fecha_desactivacion;  // storing fecha_desactivacion
        $banner->save();

        return response()->json('Banner edited successfully');
    }



    public function eliminarBanner(Request $request)
    {
        $banner = tb_carrusel_noticias::find($request->id);
        //eliminar la imagen del storage
        Storage::delete('public/' . $banner->imagen);
        $banner->delete();

        return response()->json('Banner deleted successfully');
    }



    public function actualizarEstadoBanner()
    {
        $ahora = now();

        // Obtener todos los banners
        $banners = tb_carrusel_noticias::all();

        foreach ($banners as $banner) {
            $fechaActivacion = new \Carbon\Carbon($banner->fecha_activacion);
            $fechaDesactivacion = $banner->fecha_desactivacion ? new \Carbon\Carbon($banner->fecha_desactivacion) : null;

            if (
                $ahora->greaterThanOrEqualTo($fechaActivacion) &&
                (!$fechaDesactivacion || $ahora->lessThanOrEqualTo($fechaDesactivacion))
            ) {
                $banner->estado = true;  // Activo
            } else {
                $banner->estado = false;  // Inactivo
            }

            $banner->save();
        }

        return response()->json('Estados de banners actualizados con éxito');

        /*
        Finalmente, recuerda que aunque el comando php artisan schedule:list 
        te muestre cuándo se "debería" ejecutar la tarea, la tarea real se
        ejecutará solo si el CRON en tu servidor está configurado correctamente
        y está llamando a php artisan schedule:run cada minuto.
        */ 
    }
}
