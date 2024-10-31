<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    // Relation: Un jour a plusieurs cours
    public function cour()
    {
        return $this->hasMany(Cour::class);
    }

}

