<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Area;

class QuizyController extends Controller
{
    public function index($id) {
        
        $area = Area::with(['questions.choices'])->find($id);
        $collection = collect([1, 2, 3]);$shuffled = $collection->shuffle();$shuffled->all();

        // dd($area);
        // dd($area->questions()->first()->choices()->first());
        // dd($id);

        return view('quizy.index', ['area'=>$area, 'shuffled'=>$shuffled]);
    }
}
