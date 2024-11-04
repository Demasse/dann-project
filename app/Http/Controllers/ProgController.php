<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;

class ProgController extends Controller
{

    public function program(){

        $cours=Cour::all();
        return view("home.program",compact('cours'));

    }

}
