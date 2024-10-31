<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heure extends Model
{
    use HasFactory;
    protected $fillable = [
        'jour',
        'heure_debut',
        'heure_fin',
    ];

    public function cour()
    {
        return $this->hasMany(Cour::class);
    }



}
