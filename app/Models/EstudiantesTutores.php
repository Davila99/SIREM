<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudiantesTutores extends Model
{
    use HasFactory;
public function estudiante()
{
    return $this->belongsTo(Estudiante::class);
}
public function tutores()
{
    return $this->belongsTo(Tutore::class);
}

}