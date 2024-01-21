<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto_user extends Model
{
    use HasFactory;
    protected $table = "proyecto_user";
    protected $primaryKey = ['proyecto_id','user_id'];
    public $incrementing = false;
    protected $fillable = ['proyecto_id','user_id'];
}
