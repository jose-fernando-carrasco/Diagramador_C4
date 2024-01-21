<?php

namespace App\Http\Controllers;

use App\Events\DiagramaEvent;
use App\Events\SalirseEvent;
use App\Models\Diagrama;
use App\Models\Invitacionproyecto;
use App\Models\Invitacionsala;
use App\Models\Proyecto;
use App\Models\Proyecto_user;
use App\Models\Sala;
use App\Models\Sala_user;
use App\Models\User;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function __construct(){
	    $this->middleware('auth');
    }
    
    public function create(){
        $proyectos = Proyecto::where('user_id',auth()->user()->id)->where('estadoproyecto_id','<>',3)->get();
        return view('salas.create', compact('proyectos'));
    }


    public function store(Request $request){
        $request->validate(['asunto' => 'required']);
        Sala::create(['asunto' => $request->asunto,'user_id' => $request->user_id,'proyecto_id' => $request->proyecto_id]);
        return redirect()->route('salas.create')->with('info','ok');
    }


    public function index(){
        $salas = Sala::where('user_id',auth()->user()->id)->get();
        return view('salas.index', compact('salas'));
    }


    public function destroy(Sala $sala){
        $sala->delete();
        return redirect()->route('salas.index')->with('info','ok');
    }


    public function show($sala_id, $diagrama_id){
        $sala = Sala::find($sala_id);
        $diagrama = Diagrama::find($diagrama_id);
        $proyecto = $sala->proyecto;
        $usersID = Sala_user::select('user_id')->where('sala_id',$sala->id)->get();//users que ya forman parte de la sala
        $usersInvID = Invitacionsala::select('user_recibe_id')->where('sala_id',$sala->id)->get();//users que ya tiene una invitacion
        $usersProID = Proyecto_user::select('user_id')->where('proyecto_id',$proyecto->id)->get();
        $participantes = User::whereNotIn('id', $usersID)->whereNotIn('id', $usersInvID)->whereIn('id', $usersProID)->where('id','<>',auth()->user()->id)->get();/* libres sin invitaciones ni forman parte del equipo */
        //al entrar por primera vez el organizador inicia la sala
        if($sala->user_id == auth()->user()->id && $sala->estadosala_id == 1){
            $sala->estadosala_id = 2;
            $sala->update();
        }
        //cargar en la tabla sala_user por que está entrando a esa sala
        //eliminar cuando se salga de esa sala
        //crear si no hay una sala_id y user_id ya cargado
        if(Sala_user::where('sala_id',$sala->id)->where('user_id',auth()->user()->id)->exists()){
            return view('salas.show',compact('sala','proyecto','participantes','diagrama'));
        }//No existe
        Sala_user::create(['sala_id' => $sala->id,'user_id' => auth()->user()->id]);//al salirse leaving hay que eliminar de esta tabla
        
        return view('salas.show',compact('sala','proyecto','participantes','diagrama'));
    }
    

    public function finalizar(Sala $sala){
        $sala->estadosala_id = 3;
        $sala->update();
        broadcast(new SalirseEvent($sala))->toOthers();
        return redirect()->route('salas.index')->with('finalizo','si');
    }


    public function previa(Sala $sala){
        if($sala->diagrama_id == null){
            $proyecto = $sala->proyecto;
            $diagramas = Diagrama::where('proyecto_id',$proyecto->id)->get();
            return view('salas.previa', compact('diagramas','proyecto','sala'));
        }
        return redirect()->route('salas.show',[$sala->id,$sala->diagrama->id]);
    }


    public function siguiente(Request $request){//crear un nuevo diagrama
        $sala = Sala::find($request->sala_id);
        $diagrama = Diagrama::create([
            'title' => $request->title,
            'diagram' => '{"cells": []}',
            'proyecto_id' => $request->proyecto_id
        ]); 
        
        $sala->diagrama_id = $diagrama->id;
        $sala->update();
        
        return [$sala, $diagrama];
    }

    public function elegido($sala_id, $diagrama_id){
        $sala = Sala::find($sala_id);
        $diagrama = Diagrama::find($diagrama_id);
        $sala->diagrama_id = $diagrama->id;
        $sala->update();
        return [$sala, $diagrama];
    }


    public function guardarDiagrama(Request $request, $id){
        //return $request;
        $diagrama = Diagrama::find($id);
        $diagrama->diagram = $request->diagram;
        $diagrama->update();
        

        $sala = Sala::find($request->sala_id);
        //return $sala;
        broadcast(new DiagramaEvent($diagrama,$sala))->toOthers();
        return "Con exito";
    }

    public function mostrarDiagrama($id){
        $diagrama = Diagrama::find($id);
        return $diagrama->diagram;
    }
    

}
