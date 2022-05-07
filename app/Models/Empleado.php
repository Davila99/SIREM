<?php

namespace App\Models;

use App\Models\Niveles_academico;
use App\Models\Cargo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public function nivel_academico()
    {
        return $this->belongsTo(Niveles_academico::class);
    }
    public function cargos()
    {
        return $this->belongsTo(Cargo::class);
    }
}
