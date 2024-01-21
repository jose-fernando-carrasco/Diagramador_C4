<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadosala extends Model
{
    use HasFactory;
    protected $table = "estadosalas";

    public function salas(){
        return $this->hasMany(Sala::class,'estadosala_id');
    }
    
}
