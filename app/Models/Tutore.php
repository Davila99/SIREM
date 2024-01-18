<?php

namespace App\Models;

use App\Models\Profession;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutore extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'direccion',
        'professions_id',
    ];
    use HasFactory;
    public function professions()
    {
        return $this->belongsTo(Profession::class,'professions_id','id');
    }
}
