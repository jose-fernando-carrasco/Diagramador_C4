<?php

namespace App\Http\Controllers;

use App\Events\MessageProyectoEvent;
use App\Models\Invitacionproyecto;
use App\Models\Proyecto;
use App\Models\Proyecto_user;
use App\Models\User;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function __construct(){
	    $this->middleware('auth');
    }

    public function index(){
        $proyectos = Proyecto::where('user_id',auth()->user()->id)->get();
        return view('proyectos.index', compact('proyectos'));
    }


    public function show(Proyecto $proyecto){
        $usersID = Proyecto_user::select('user_id')->where('proyecto_id',$proyecto->id)->get();
        $users = User::whereIn('id', $usersID)->get();
        $usersInvID = Invitacionproyecto::select('user_recibe_id')->where('proyecto_id',$proyecto->id)->where('aceptado',false)->get();
        $participantes = User::whereNotIn('id', $usersID)->whereNotIn('id', $usersInvID)->where('id','<>',auth()->user()->id)->get();
        return view('proyectos.show', compact('proyecto','users','participantes'));
    }


    public function destroy(Proyecto $proyecto){
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('info','ok');
    }


    public function create(){
        return view('proyectos.create');
    }


    public function store(Request $request){
        $request->validate(['title' => 'required']);
        Proyecto::create($request->all());
        return redirect()->route('proyectos.create')->with('info','ok');;
    }


    public function expulsar(Proyecto $proyecto, User $user){
        Proyecto_user::where('proyecto_id',$proyecto->id)->where('user_id',$user->id)->delete();
        return redirect()->route('proyectos.show',$proyecto)->with('expul','ok');
    }
    
}
