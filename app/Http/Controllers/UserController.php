<?php

namespace App\Http\Controllers;

use App\Models\Architect;
use App\Models\Diagrama;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Aws\S3\Exception\S3Exception;


class UserController extends Controller
{

    public function get_user($user_id){
        $user = User::find($user_id);
        return $user;
    } 


    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }


    public function destroy(User $user){
        if($user->id != 1){
           $user->delete();
           return redirect()->route('users.index')->with('info','ok');
        }else{
           return redirect()->route('users.index')->with('info','adm');
        }
    }


    public function show(User $user){
        return view('users.show',compact('user'));
    }


    public function update(Request $request){
        $request->validate(['name' => 'required', 'email' => 'required', 'phone' => 'required', 'password' => 'required', 'password2' => 'required']);
        // return $request;
        //Me quedé aquí xd no puedo actualizar contra
        $user = User::find($request->user_id);
        if($request->password == $user->password){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telefono = $request->phone;
            $user->password = bcrypt($request->password2);
            $user->update();
            return $request;
            return redirect()->route('users.show',$user)->with('info','ok');
        }
        // return $request;
        return redirect()->route('users.show',$user)->with('info','no');
    }
    

    public function subirfoto(Request $request){
        $request->validate(['file' => 'required|image']);
        
        $imagen = $request->file('file')->store('public/perfiles');
        // return $imagen;
        // $url = Storage::url($imagen);
        // return $url;
        $user = User::find(auth()->user()->id);
        $user->url = 'storage/'.$imagen;
        $user->hayFoto = true;
        $user->update();// error de dominio localhost:8000
        // return $url;
        return redirect()->route('users.show',auth()->user());
    }


    function importarArchitect(Request $request){
        $request->validate(['file' => 'required']);

        $diagrama = Diagrama::find($request->diagrama_id);
        $fp = fopen($request->file, "r");
        $xml = "";
        
        while (!feof($fp)) {
            $xml .= fgets($fp);
        }
        $xml = simplexml_load_string($xml);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        
        $array = $array["Table"];
        $figuras = []; 
        $posis = [];
        
        for ($i=0; $i < count($array); $i++) { 
            switch ($array[$i]["@attributes"]["name"]) {
                case "t_object":
                    $figuras = $array[$i]["Row"];
                    break;
                case "t_diagramobjects":
                    $posis = $array[$i]["Row"];
                    break;
            }
        }

        $figurasText = '';
        for ($i=1; $i < count($figuras); $i++) {
            if($i+1 == count($figuras)){
                $figurasText .= $this->getO($figuras[$i]["Column"], $posis[$i-1]["Column"]); 
            }else{
                $figurasText .= $this->getO($figuras[$i]["Column"], $posis[$i-1]["Column"]).',';
            }
        }
        
        $dia = '{"cells": ['.$figurasText.']}';
        $XD = trim(preg_replace('/\s+/', ' ', $dia));
        
        $diagrama->diagram = $XD;
        $diagrama->update();
        
        return redirect()->back();
    }

    public function getO($objeto,$posicion){
        if($objeto[1]["@attributes"]["value"] == "Package"){
            return '';
        }

        $newx = ((int) $posicion[3]["@attributes"]["value"])+700;
        $newy = -1 * ((int) $posicion[2]["@attributes"]["value"])+800;
        if($objeto[1]["@attributes"]["value"] == "CollaborationOccurrence"){
            $nro = 24;
            $id = substr($objeto[$nro]["@attributes"]["value"], 1, strlen($objeto[$nro]["@attributes"]["value"])-1);
            $Db = '{"type": "custom.BD","position": {"x": ' . $newx . ',"y": ' . $newy . '},"size": {"width": ' . (int) $posicion[4]["@attributes"]["value"] - (int) $posicion[3]["@attributes"]["value"] . ',"height": ' . (int) $posicion[2]["@attributes"]["value"] - (int) $posicion[5]["@attributes"]["value"] . '},"angle": 0,"id": "' . $id . '","z": ' . $objeto[0]["@attributes"]["value"] . ',"attrs": {"body": {"fill": "#23A2D9","stroke": "#0E7DAD","strokeDasharray": "0"},"top": {"fill": "#23A2D9","stroke": "#0E7DAD","strokeDasharray": "0"},"titulo": {"text": " ","fontSize": 11,"fontWeight": "Normal","fill": "#F7F8F9","fontFamily": "Roboto Condensed","strokeWidth": 0},"subtitulo": {"text": "'.$objeto[3]["@attributes"]["value"].'","fontSize": 11,"fill": "#F7F8F9","fontFamily": "Roboto Condensed","fontWeight": "Normal"},"contenido": {"text": " ","fontSize": 12,"fill": "#F7F8F9","fontWeight": "Normal"},"root": {"dataTooltipPosition": "left","dataTooltipPositionSelector": ".joint-stencil"}}}';
            return $Db;
        }

        if($objeto[1]["@attributes"]["value"] == "Boundary"){ //26
            $nro = 26;
            $id = substr($objeto[$nro]["@attributes"]["value"], 1, strlen($objeto[$nro]["@attributes"]["value"])-1);
            $anch = (int) $posicion[4]["@attributes"]["value"] - (int) $posicion[3]["@attributes"]["value"] +300;
            $alta = (int) $posicion[2]["@attributes"]["value"] - (int) $posicion[5]["@attributes"]["value"] +200;
            $bum = '{"type": "custom.Bum","position": {"x": ' . $newx . ',"y": ' . $newy . '},"size": {"width": ' . $anch .',"height": ' . $alta .'},"angle": 0,"id": "' . $id . '","z": ' . $objeto[0]["@attributes"]["value"] . ',"attrs": {"body": {"stroke": "#B9B6B6","rx": 2,"ry": 2,"width": 50,"height": 30,"strokeDasharray": "10.5"},"root": {"dataTooltipPosition": "left","dataTooltipPositionSelector": ".joint-stencil"}}}';
            return $bum;
        }

        $nro = 24;
        $id = substr($objeto[$nro]["@attributes"]["value"], 1, strlen($objeto[$nro]["@attributes"]["value"])-1);
        $actor = '{"type": "custom.Actor","position": {"x": ' . $newx . ',"y": ' . $newy . '},"size": {"width": ' . (int) $posicion[4]["@attributes"]["value"] - (int) $posicion[3]["@attributes"]["value"] . ',"height": ' . (int) $posicion[2]["@attributes"]["value"] - (int) $posicion[5]["@attributes"]["value"] . '},"angle": 0,"id": "' . $id . '","z": ' . $objeto[0]["@attributes"]["value"] . ',"attrs": {"body": {"stroke": "#0B3661","fill": "#083F75"},"titulo": {"text": " ","fontSize": 15,"fontWeight": "Bold","fill": "#F7F8F9","fontFamily": "Roboto Condensed"},"subtitulo": {"text": "'.$objeto[3]["@attributes"]["value"].'","fontSize": 11,"fill": "#F7F8F9","fontFamily": "Roboto Condensed","fontWeight": "Normal"},"contenido": {"text": " ","fontSize": 12,"fontWeight": "Normal"},"root": {"dataTooltipPosition": "left","dataTooltipPositionSelector": ".joint-stencil"}}}';
        
        
        return $actor;

        
    }

  
    
}
