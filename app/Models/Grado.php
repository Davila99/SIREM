<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion'];

    public function grupo()
    {
        return $this->belongsTo(Grupos::class);
    }
}
