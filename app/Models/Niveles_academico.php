<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveles_academico extends Model
{
    use HasFactory;
    public function empleados()
    {
        return $this->hasOne(Empleado::class, 'id');
    }
}
