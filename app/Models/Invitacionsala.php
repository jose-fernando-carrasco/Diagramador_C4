<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitacionsala extends Model
{
    use HasFactory;
    protected $table = "invitacionsalas";
    protected $fillable = ['user_envio_id','user_recibe_id','proyecto_id','sala_id','diagrama_id','tipo'];

    public function user_sala_envio(){
        return $this->belongsTo(User::class, 'user_envio_id');
    }

    public function user_sala_recibe(){
        return $this->belongsTo(User::class, 'user_recibe_id');
    }

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public function sala(){
        return $this->belongsTo(Sala::class);
    }

    public function diagrama(){
        return $this->belongsTo(Diagrama::class);
    }

}
