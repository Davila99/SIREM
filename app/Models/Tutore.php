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
        return $this->hasMany(Profession::class);
    }
}
