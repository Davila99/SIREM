<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignaturaDocente extends Model
{
    use HasFactory;
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
    public function empleado()
    {
        
        return $this->belongsTo(Empleado::class);
    }

}
