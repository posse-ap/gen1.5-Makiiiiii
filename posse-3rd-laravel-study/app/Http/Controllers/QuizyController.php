<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Area;

class QuizyController extends Controller
{
    public function index($id) {
        
        $area = Area::with(['questions.choices'])->find($id);
        // dd($area);
        // dd($area->questions()->first()->choices()->first());
        // dd($id);

        return view('quizy.index', ['area'=>$area]);
    }
}
