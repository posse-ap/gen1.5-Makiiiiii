<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Area;

class QuizyController extends Controller
{
    public function index() {
        
        $areas = Area::all();

        return view('quizy.index',['areas'=>$areas]);
    }
}
