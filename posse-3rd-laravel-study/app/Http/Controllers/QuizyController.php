<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Area;
use App\Question;
use App\Choice;


class QuizyController extends Controller
{
    public function index($id) {
        
        $area = Area::with(['questions.choices'])->find($id);
        
        // dd($area);
        // dd($area->questions()->first()->choices()->first());
        // dd($id);

        return view('quizy.index', compact('area'));

    }

    public function area($id) {
        
        $items = Choice::all();

        return view('quizy.index', compact('items'));
    }

    public function __construct(){
        $this->middleware('auth');
    }
}
