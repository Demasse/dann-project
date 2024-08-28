<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;



class Cour extends Model
{
    use HasFactory;

    protected $fillable = ['nom','description','module_id'];

   public function modules(){

    return $this->hasMany(Module::class);

   }



}
