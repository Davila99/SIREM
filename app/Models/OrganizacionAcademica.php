<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizacionAcademica extends Model
{
    use HasFactory;
    public function asignaturaDocentes()
    {
        return $this->hasMany(AsignaturaDocente::class, 'id');
    }
    
}
