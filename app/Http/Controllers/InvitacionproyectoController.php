<?php

namespace App\Http\Controllers;

use App\Events\MessageProyectoEvent;
use App\Models\Invitacionproyecto;
use App\Models\Proyecto_user;
use Illuminate\Http\Request;

class InvitacionproyectoController extends Controller
{

    public function __construct(){
	    $this->middleware('auth');
    }


    public function index(){
        $invitaciones = Invitacionproyecto::where('user_recibe_id', auth()->user()->id)->get();
        return view('proyectos.invitaciones.index', compact('invitaciones'));
    }


    public function invitacionesstore2(Request $request){
        $invitacion = new Invitacionproyecto();
        $invitacion->user_envio_id = auth()->user()->id;
        $invitacion->user_recibe_id = $request->user_recibe_id;
        $invitacion->proyecto_id = $request->proyecto_id;
        $invitacion->save();
        broadcast(new MessageProyectoEvent($invitacion))->toOthers();
        return $invitacion;
    }


    public function cantidad(){
        $invP = Invitacionproyecto::where('user_recibe_id',auth()->user()->id)->where('leido',false)->get();
        if(count($invP) == 0){return "";}
        return count($invP);
    }


    public function get(){
        $invP = Invitacionproyecto::select('invitacionproyectos.id','proyectos.title')
                ->join('proyectos','invitacionproyectos.proyecto_id','=','proyectos.id')
                ->where('user_recibe_id',auth()->user()->id)->where('leido',false)->get();
        return $invP;
    }


    public function destroy(Invitacionproyecto $invitacion){
        $invitacion->delete();
        return redirect()->route('invitacionesP.index')->with('info','ok');
    }


    public function show(Invitacionproyecto $invitacion){
        $invitacion->leido = true;
        $invitacion->update();
        return view('proyectos.invitaciones.show', compact('invitacion'));
    }


    public function aceptar(Invitacionproyecto $invitacion){
        if($invitacion->aceptado){ return redirect()->route('invitacionesP.show',$invitacion)->with('aceptado','yala'); }
        $invitacion->aceptado = true;
        $invitacion->update();
        Proyecto_user::create(['proyecto_id' => $invitacion->proyecto->id,'user_id' => $invitacion->user_recibe->id]);
        return redirect()->route('invitacionesP.index')->with('aceptado','ok');
    }
    

}
