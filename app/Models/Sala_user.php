<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala_user extends Model
{
    use HasFactory;
    protected $table = "sala_user";
    protected $primaryKey = ['sala_id','user_id'];
    public $incrementing = false;
    protected $fillable = ['sala_id','user_id'];
    
}
