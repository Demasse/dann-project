<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;

class Competence extends Model
{

    use HasFactory;

    // protected $with=[
    //     'module'
    // ];
    public function module(){

return $this->belongsTo(Module::class);

    }



}
