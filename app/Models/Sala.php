<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    protected $table = "salas";
    protected $fillable = ['asunto', 'user_id', 'proyecto_id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }
    
    public function estado(){
        return $this->belongsTo(Estadosala::class, 'estadosala_id');
    }

    public function invitaciones(){
        return $this->hasMany(Invitacionsala::class);
    }
    
    public function diagrama(){
        return $this->belongsTo(Diagrama::class);
    }
}
