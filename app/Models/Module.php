<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Competence;
use App\Models\Cours;
class Module extends Model
{
    protected $with=['competence','cour'];
    use HasFactory;
    protected $fillable = [] ;

   public function cour(){

    return   $this->belongsTo(Cours::class);

   }

   public function competence(){

   return $this->hasOne(Competence::class);

   }

}
