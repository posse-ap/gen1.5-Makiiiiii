<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebappController extends Controller
{
    public function index() {
        
        // $area = Area::with(['questions.choices'])->find($id);
        
        // dd($area);
        // dd($area->questions()->first()->choices()->first());
        // dd($id);

        return view('webapp.index');

    }
}
