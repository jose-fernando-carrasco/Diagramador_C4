<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = ['title','descripcion','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function estadoproyecto(){
        return $this->belongsTo(Estadoproyecto::class);
    }

    public function invitaciones(){
        return $this->hasMany(Invitacionproyecto::class);
    }

    public function salas(){
        return $this->hasMany(Sala::class);
    }

    public function invitaciones_salas(){
        return $this->hasMany(Invitacionsala::class);
    }
    
    public function diagramas(){
        return $this->hasMany(Diagrama::class);
    }
}
