<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;
    public function tutores()
    {
        return $this->hasMany(Tutore::class,'tutor_id','id');
    }
}
