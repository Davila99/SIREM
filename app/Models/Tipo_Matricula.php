<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Matricula extends Model
{
    use HasFactory;
    public function professions()
    {
        return $this->hasMany(Tutore::class);
    }
}
