<?php

namespace App\Http\Controllers;

use App\Events\MessageSalaEvent;
use App\Models\Invitacionproyecto;
use App\Models\Invitacionsala;
use App\Models\Proyecto;
use App\Models\Sala;
use App\Models\User;
use App\Notifications\SalaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class InvitacionsalaController extends Controller
{
    public function index(){
        $invs = Invitacionsala::where('user_recibe_id',auth()->user()->id)->where('leido',false)->get();
        foreach( $invs as $i){
            $i->leido = true;
            $i->update();
        }
        $invitaciones = Invitacionsala::where('user_recibe_id',auth()->user()->id)->get();
        return view('salas.invitaciones.index',compact('invitaciones'));
    }

    public function store(Request $request){
        $sala = Sala::find($request->sala_id);

        $invitacion = Invitacionsala::create([
                'user_envio_id' => auth()->user()->id,
                'user_recibe_id' => $request->user_recibe_id,
                'proyecto_id' => $request->proyecto_id,
                'sala_id' => $request->sala_id,
                'diagrama_id' => $request->diagrama_id,
                'tipo' => $request->tipo
        ]);
        broadcast(new MessageSalaEvent($invitacion))->toOthers();
       //trabajar despues en el m,ensaje de correo del campo tipo
        $url = route('salas.show', ['sala' => $request->sala_id,'diagrama' => $request->diagrama_id ]);
        $user = User::find($request->user_recibe_id);
        if( $request->tipo == 0 ){ $tipo = 'Colaborador';}else{$tipo = 'Visitante';} 
        $invitacion = [
            'saludo' => 'Hola que tal '.$user->name,
            'contenido' => auth()->user()->name.' le envió esta invitación de '.$tipo.' para ser participe de una reunión para una sala con el asunto de: '.$sala->asunto,
            'botonTexto' => 'Entrar a la sala',
            'url' => $url,
            'ultimaLinea' => 'Esperando su participacion en la sala me despido con un cordial saludo'
        ];
        // de momento comentado para no llenar de correos
        Notification::send( $user, new SalaNotification( $invitacion));

        return $invitacion;
    }


    public function cantidad(){
        $invS = Invitacionsala::where('user_recibe_id',auth()->user()->id)->where('leido',false)->get();
        $invP = Invitacionproyecto::where('user_recibe_id',auth()->user()->id)->where('leido',false)->get();
        if(count($invP) + count($invS) == 0){return "";}
        return count($invP) + count($invS);
    }


    public function get(){
        $invS = Invitacionsala::select('invitacionsalas.id','salas.asunto')
                ->join('salas','invitacionsalas.sala_id','=','salas.id')
                ->where('user_recibe_id',auth()->user()->id)->where('leido',false)->get();
        return $invS;
    }


    public function destroy(Invitacionsala $invitacion){
        $invitacion->delete();
        return redirect()->route('invitacionsalas.index')->with('info','ok');
    }


    public function esVisitante($sala_id){
        $inv = Invitacionsala::where('sala_id',$sala_id)->where('user_recibe_id',auth()->user()->id)->first();
        if($inv == null){ return false;}
        return $inv->tipo == 1;
    }

    // {proy_id}/sala/{sala_id}/userenvio/{user_envio_id}
    public function getInvitacion($proy_id, $sala_id, $user_envio_id){
       $proyecto = Proyecto::find($proy_id); 
       $sala = Sala::find($sala_id);
       $user = User::find($user_envio_id);
       return [$proyecto->title, $sala->asunto, $user->name, $sala->estado->name];
    }

}
