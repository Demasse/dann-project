<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;



class Cour extends Model
{
    use HasFactory;

    protected $fillable = ['nom','description','jour_id','module_id'];

   public function modules(){

    return $this->hasMany(Module::class);

   }

   


   // Relation: Un cours appartient à un jour
   public function jour()
   {
       return $this->belongsTo(Jour::class);
   }

   public function heure()
   {
       return $this->belongsToMany(Heure::class);
   }



}
