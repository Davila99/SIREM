<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignaturaDocente extends Model
{
    use HasFactory;
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class,'asignatura_id','id');
    }
    public function empleado()
    {      
        return $this->belongsTo(Empleado::class);
    }
    public function grupo()
    {      
        return $this->belongsTo(Grupos::class);
    }
    public function grado()
    {
        return $this->hasOneThrough(Grado::class,Grupos::class,'grado_id','id','grupo_id','id');
    }

    public function organizacionAcademica()
    {
        return $this->belongsTo(OrganizacionAcademica::class,'organizacion_academica_id');
    }

}
