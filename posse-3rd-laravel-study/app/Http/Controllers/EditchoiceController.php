<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CHoice;

class EditchoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($question_id)
    {
        $choices = Choice::where('question_id', $question_id)->get();
        $question_id = $question_id;
        return view('editchoice.index', compact('choices', 'question_id'));
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
        $question_id = $request->question_id;
        unset($form['_token']);
        Choice::create($form);
        return redirect()->route('editchoice_index',['question_id'=>$question_id])->with('success', '新規登録完了しました');
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
    public function edit($question_id, $id)
    {
        $choice = Choice::find($id);
        $question_id = $question_id;
        return view('editchoice.edit', compact('choice', 'question_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $question_id)
    {
        $id = $request->id;
        $question_id = $request->question_id;
        $update = [
            'name' => $request->name,
        ];
        Choice::where('id', $id)->update($update);
        return redirect()->route('editchoice_index', ['question_id'=>$question_id])->with('success', '編集完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $question_id, $id)
    {
        $id = $request->id;
        $question_id = $request->question_id;
        Choice::where('id', $id)->delete();
        return redirect()->route('editchoice_index', $question_id)->with('success', '削除完了しました');
    }
}
