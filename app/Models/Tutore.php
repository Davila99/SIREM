<?php

namespace App\Models;

use App\Models\Profession;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutore extends Model
{
    use HasFactory;
    public function professions()
    {
        return $this->belongsTo(Profession::class,'professions_id','id');
    }
    public function estudiante()
    {
        return $this->hasMany(Estudiante::class,'id');
    }
}
