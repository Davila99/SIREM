<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    public function tipo_matricula()
    {
        return $this->belongsTo(Tipo_Matricula::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function grupos()
    {
        return $this->belongsTo(Grupos::class);
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
