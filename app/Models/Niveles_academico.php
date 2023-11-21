<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveles_academico extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion'];
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id');
    }
}
