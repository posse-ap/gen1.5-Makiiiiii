<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class EditquestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($area_id)
    {
        $questions = Question::where('area_id', $area_id)->orderBy('list', 'asc')->get();
        $area_id = $area_id;
        return view('editquestion.index', compact('questions', 'area_id'));
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
    public function store(Request $request, $area_id)
    {
        $form = $request->all();
        $area_id = $request->area_id;
        unset($form['_token']);
        Question::create($form);
        return redirect()->route('editquestion_index',['area_id'=>$area_id])->with('success', '新規登録完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($area_id, $id)
    {
        $question = Question::find($id);
        $area_id = $area_id;
        return view('editquestion.edit', compact('question', 'area_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $area_id)
    {
        $id = $request->id;
        $area_id = $request->area_id;
        $update = [
            'image_path' => $request->image_path,
        ];
        Question::where('id', $id)->update($update);
        return redirect()->route('editquestion_index', ['area_id'=>$area_id])->with('success', '編集完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $area_id, $id)
    {
        $id = $request->id;
        $area_id = $request->area_id;
        Question::where('id', $id)->delete();
        return redirect()->route('editquestion_index', $area_id)->with('success', '削除完了しました');
    }

    public function list(Request $request)
    {
        $update = [
            'list' => $request->list,
        ];
        Question::where('id', $request->id)->update($update);
        return redirect()->route('editquestion_index', $request->area_id)->with('success', '移動完了しました');
    }
}
