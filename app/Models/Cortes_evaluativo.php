<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cortes_evaluativo extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion'
    ];
    public function calificaciones()
    {
        return $this->hasMany(Calificaciones::class);
    }

    
}
