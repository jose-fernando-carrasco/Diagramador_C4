<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagrama extends Model
{
    use HasFactory;
    protected $table = "diagramas";
    protected $fillable = ['title','diagram','proyecto_id'];

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public function invitacionsalas(){
        return $this->hasMany(Invitacionsala::class);
    }

    public function salas(){
        return $this->hasMany(Sala::class);
    }
}
