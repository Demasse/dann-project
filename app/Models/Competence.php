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

    protected $fillable = ['titre','module_id'];

    public function module(){

return $this->belongsTo(Module::class);

    }



}
