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
        'heure_debut',
        'heure_fin',
        'nom'
    ];

    protected $with=[
        'cour'
    ];

    // Définir la relation avec le modèle Course
    public function cour()
    {
        return $this->belongsTo(Cour::class); // Assurez-vous que 'Cour' est le bon modèle
    }

}
