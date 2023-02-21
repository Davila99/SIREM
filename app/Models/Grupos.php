<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Grupos extends Model
{
    use HasFactory;
 
    public function grado()
    {
        return $this->hasOne(Grado::class,'id','grado_id');
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class,'id','empleado_id');
    }
    
    public function asignaturaDocente()
    {
        return $this->hasMany(AsignaturaDocente::class);
    }
   
}
