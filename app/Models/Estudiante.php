<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    public function tutores()
    {
        return $this->belongsTo(Tutore::class);
    }
    public function sexos()
    {
        return $this->belongsTo(Sexo::class);
    }
}
