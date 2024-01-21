<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitacionproyecto extends Model
{
    use HasFactory;
    protected $fillable = ['user_envio_id','user_recibe_id','proyecto_id'];

    public function user_envio(){
        return $this->belongsTo(User::class, 'user_envio_id');
    }

    public function user_recibe(){
        return $this->belongsTo(User::class, 'user_recibe_id');
    }

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }
}
