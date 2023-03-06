<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizacionAcademica extends Model
{
    use HasFactory;
    public function asignaturaDocente()
    {
        return $this->belongsTo(AsignaturaDocente::class);
    }
    
}
