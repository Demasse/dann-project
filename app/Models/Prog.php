<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cour;

class Prog extends Model
{
    use HasFactory;

    // Indiquez les attributs pouvant être assignés en masse
    protected $fillable = [
        'cour_id',
        'jour',
        'creneau', // Remplacer heure_debut et heure_fin par creneau
        'nom'
    ];

    protected $with = [
        'cour'
    ];

    // Définir la relation avec le modèle Cour
    public function cour()
    {
        return $this->belongsTo(Cour::class);
    }
}
