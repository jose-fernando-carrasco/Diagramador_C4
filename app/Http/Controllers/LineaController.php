<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use App\Models\Punto;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    public function index(){
        $lineas = Linea::all();
        return response()->json(['lineas' => $lineas],200);
    }

    public function getPuntosIda($nro){
        $linea = Linea::where('nro',$nro)->where('sentido',0)->first();
        $puntos = Punto::select('puntos.*')->join('lineas','puntos.linea_id','=','lineas.id')->where('puntos.linea_id',$linea->id)->orderBy('orden','asc')->get();
        return response()->json(['linea' => $linea,'puntos' => $puntos],200); 
    }

    public function getPuntosVuelta($nro){
        $linea = Linea::where('nro',$nro)->where('sentido',1)->first();
        $puntos = Punto::select('puntos.*')->join('lineas','puntos.linea_id','=','lineas.id')->where('puntos.linea_id',$linea->id)->orderBy('orden','asc')->get();
        return response()->json(['linea' => $linea,'puntos' => $puntos],200); 
    }
}
