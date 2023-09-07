<?php

namespace App\Http\Controllers;

use App\Models\tb_carrusel_noticias;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TbCarruselNoticiasController extends Controller
{
    public function bannerData(){
        $datosBanner = tb_carrusel_noticias::all();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
        ]);

        $date = date('Y-m-d H-i-s');
        //obtener el nombre de la imagen
        $fotoName = $date.'_'.$request->file('foto')->getClientOriginalName();
        //guardar la imagen public storage
        $fotoPath = $request->file('foto')->storeAs('public', $fotoName);

        // Create a new banner instance
        $banner = new tb_carrusel_noticias;
        $banner->nombre = $request->nombre;
        $banner->link = $request->link;
        $banner->imagen = $fotoName;
        $banner->save();

        return response()->json('Banner registered successfully');
    }

    public function editarBanner(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
        ]);

        $banner = tb_carrusel_noticias::find($request->id);

        Storage::delete('public/'.$banner->imagen);

        if($request->hasFile('foto')){

            $date = date('Y-m-d H-i-s');
            //obtener el nombre de la imagen
            $fotoName = $date.'_'.$request->file('foto')->getClientOriginalName();
            
            //guardar en public en carpeta img, con el nombre de la imagen de fotoName
            $fotoPath = $request->file('foto')->storeAs('public', $fotoName);
            $banner->imagen = $fotoName;
        }

        $banner->nombre = $request->nombre;
        $banner->link = $request->link;
        $banner->save();

        return response()->json('Banner edited successfully');
    }

    public function eliminarBanner(Request $request){
        $banner = tb_carrusel_noticias::find($request->id);
        //eliminar la imagen del storage
        Storage::delete('public/'.$banner->imagen);
        $banner->delete();

        return response()->json('Banner deleted successfully');
    }
}
