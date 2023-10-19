<?php

namespace App\Http\Controllers;

use App\Models\CarruselMascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarruselMascotaController extends Controller
{
    public function bannerData()
    {
        $datosBanner = CarruselMascota::all();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
        ]);

        $date = date('Y-m-d H-i-s');
        //obtener el nombre de la imagen
        $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();
        //guardar la imagen public storage
        $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

        // Create a new banner instance
        $banner = new CarruselMascota;
        $banner->nombre = $request->nombre;
        $banner->imagen = $fotoName;
        $banner->save();

        return response()->json('Banner registered successfully');
    }

    public function editarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
        ]);

        $banner = CarruselMascota::find($request->id);

        if ($request->hasFile('foto')) {
            $date = date('Y-m-d H-i-s');
            $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();
            $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

            if ($banner->imagen) {
                Storage::delete('public/' . $banner->imagen);
            }

            $banner->imagen = $fotoName;
        }

        $banner->nombre = $request->nombre;
        $banner->save();

        return response()->json('Banner edited successfully');
    }

    public function eliminarBanner(Request $request)
    {
        $banner = CarruselMascota::find($request->id);
        //eliminar la imagen del storage
        Storage::delete('public/' . $banner->imagen);
        $banner->delete();

        return response()->json('Banner deleted successfully');
    }
}
