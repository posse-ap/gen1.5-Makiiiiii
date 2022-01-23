<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class EdittitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('edittitle.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Area::create($form);
        return redirect()->route('edittitle.index')->with('success', '新規登録完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // if ($request) {
        //     $change = $request + 1;
        //     $update = [
        //         'list' => $change->list,
        //     ];
        //     Area::where('id', $id)->list($update);
        //     $areas = Area::orderBy('list')->get();
        //     return view('edittitle.index', compact('areas'));
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        return view('edittitle.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            'area' => $request->area,
        ];
        Area::where('id', $id)->update($update);
        return back()->with('success', '編集完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area::where('id', $id)->delete();
        return redirect()->route('edittitle.index')->with('success', '削除完了しました');
    }

    // public function list(Request $request)
    // {

    // }
}

        // $sort = $request->get('sort');
        // $move = $request->get('move');
        // if ($sort) {
        //     if ($sort === '1') {
        //         $areas = Area::orderBy('created_at')->get();
        //     } elseif ($sort === '2') {
        //         $areas = Area::orderBy('created_at', 'DESC')->get();
        //     } elseif ($sort === '3') {
        //         $areas = Area::orderBy('area')->get();
        //     } elseif ($sort === '4') {
        //         $areas = Area::orderBy('area', 'DESC')->get();
        //     }

        // } 

        // if ($move) {
        //     $change = $move + 1;
        //     $update = [
        //         'list' => $change->list,
        //     ];
        //     Area::where('id', $id)->update($update);
            
        //     $areas = Area::orderBy('list')->get();
        // } 
        // else {
        //     $areas = Area::all();
        
        // }

        // return view('edittitle.index', compact('areas'));