<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Language;
use App\Model\Content;
use App\Model\User;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $languages = Language::all();
        $contents = Content::all();

        return view('admin.index', compact('languages', 'contents', 'user'));
    }

    public function language_store(Request $request)
    {

        $language = new Language();
        $language->name = $request->name;
        $language->color = $request->color;
        $language->save();
        return redirect()->route('admin_index')->with('success', '新規登録完了しました');
    }

    public function language_edit($id)
    {
        $language = Language::find($id);
        return view('admin.language_edit', compact('language'));
    }

    public function language_update(Request $request)
    {
        $language = Language::find($request->id);
        $language->name = $request->name;
        $language->color = $request->color;
        $language->save();
        return redirect()->route('admin_index')->with('success', '編集完了しました');
    }

    public function language_destroy(Request $request)
    {
        Language::find($request->id)->delete();
        return redirect()->route('admin_index')->with('success', '削除完了しました');
    }

    // 学習コンテンツ
    public function content_index()
    {
        $user = Auth::user();
        $languages = Language::all();
        $contents = Content::all();

        return view('admin.content_index', compact('languages', 'contents', 'user'));
    }

    public function content_store(Request $request)
    {

        $content = new Content();
        $content->name = $request->name;
        $content->color = $request->color;
        $content->save();
        return redirect()->route('admin_content_index')->with('success', '新規登録完了しました');
    }

    public function content_edit($id)
    {
        $content = Content::find($id);
        return view('admin.content_edit', compact('content'));
    }

    public function content_update(Request $request)
    {
        $content = Content::find($request->id);
        $content->name = $request->name;
        $content->color = $request->color;
        $content->save();
        return redirect()->route('admin_content_index')->with('success', '編集完了しました');
    }

    public function content_destroy(Request $request)
    {
        Content::find($request->id)->delete();
        return redirect()->route('admin_content_index')->with('success', '削除完了しました');
    }

    // ユーザー追加
    public function user_index()
    {
        return view('admin.user_index');
    }

    public function user_store(Request $request)
    {
        // dd($request);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_admin = boolval($request->is_admin);
        $user->save();
        // dd($user);
        return redirect()->route('admin_user_index')->with('success', '新規登録完了しました');
    }
}
