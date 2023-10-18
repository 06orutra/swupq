<?php

namespace App\Http\Controllers;

use App\Models\CarruselMascota;
use Illuminate\Http\Request;

class CarruselMascotaController extends Controller
{
    public function bannerData()
    {
        $datosBanner = tb_banner::all();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
            'Poli_o_Polo' => 'required|boolean',
        ]);

        $date = date('Y-m-d H-i-s');
        // Obtener el nombre de la imagen
        $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();
        // Guardar la imagen en el almacenamiento público
        $fotoPath = $request->file('foto')->storeAs('public', $fotoName);
    
        // Create a new banner instance
        $banner = new tb_banner;
        $banner->nombre = $request->nombre;
        $banner->link = $request->link;
        $banner->imagen = $fotoName;
        $banner->Poli_o_Polo = $request->Poli_o_Polo; // Asignar el valor booleano
        $banner->save();
    
        return response()->json('Banner registered successfully');
    }

    public function editarBanner(Request $request)
    {


        $request->validate([
            'nombre' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
            'Poli_o_Polo' => 'required|boolean',
        ]);

        $banner = tb_banner::find($request->id);

    if ($request->hasFile('foto')) {
        $date = date('Y-m-d H-i-s');
        // Obtener el nombre de la imagen
        $fotoName = $date . '_' . $request->file('foto')->getClientOriginalName();

        // Guardar en el almacenamiento público en la carpeta 'img' con el nombre de la imagen '$fotoName'
        $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

        // Luego, eliminar la imagen anterior
        if ($banner->imagen) {
            Storage::delete('public/' . $banner->imagen);
        }

        $banner->imagen = $fotoName;
    }

    $banner->nombre = $request->nombre;
    $banner->link = $request->link;
    $banner->Poli_o_Polo = $request->Poli_o_Polo; // Asignar el valor booleano
    $banner->save();

    return response()->json('Banner edited successfully'); 
    }

    public function eliminarBanner(Request $request)
    {
        $banner = tb_banner::find($request->id);
        //eliminar la imagen del storage
        Storage::delete('public/' . $banner->imagen);
        $banner->delete();

        return response()->json('Banner deleted successfully');
    }
}
