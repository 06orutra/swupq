<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    public function insertarCarrera(Request $request){
        echo($request);
        
        return "aqui se inserta la carrera";
    }
}
