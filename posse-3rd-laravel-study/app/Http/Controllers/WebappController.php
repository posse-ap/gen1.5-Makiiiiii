<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Studylog;
use App\Model\LanguageStudylog;
use App\Model\ContentStudylog;
use App\Model\Language;
use App\Model\Content;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WebappController extends Controller
{
    public function index()
    {

        // ユーザー
        $user = Auth::user();

        // 日付関連
        $dt_from = Carbon::now()->startOfMonth();
        $dt_to = Carbon::now()->endOfMonth();
        $today = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('Y年m月');
        $lastdate = Carbon::now()->endOfMonth()->format('d');

        // 学習時間の表示・グラフ
        $totalStudylogs = Studylog::all();
        $todayStudylogs = Studylog::where('date', $today)->get();
        $thismonthStudylogs = Studylog::whereBetween('date', [$dt_from, $dt_to])
            ->selectRaw('SUM(study_time) AS study_time, date')
            ->groupBy('date')
            ->get();

        // 学習言語のグラフ
        $languages = Language::withTrashed()->get();
        $thismonthLanguages = LanguageStudylog::whereBetween('date', [$dt_from, $dt_to])
            ->selectRaw('SUM(study_time) AS study_time, language_id')
            ->orderBy('language_id')
            ->groupBy('language_id')
            ->get();

        // 学習コンテンツのグラフ
        $contents = Content::withTrashed()->get();
        $thismonthContents = ContentStudylog::whereBetween('date', [$dt_from, $dt_to])
            ->selectRaw('SUM(study_time) AS study_time, content_id')
            ->orderBy('content_id')
            ->groupBy('content_id')
            ->get();

        // モーダル用
        $real_languages = Language::all();
        $real_contents = Content::all();

        return view('webapp.index', compact('todayStudylogs', 'thismonthStudylogs', 'totalStudylogs', 'lastdate', 'languages', 'thismonthLanguages', 'contents', 'thismonthContents', 'user', 'thisMonth', 'real_languages', 'real_contents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 学習時間
        $studylog = new Studylog();
        $studylog->user_id = $request->user_id;
        $studylog->date = $request->date;
        $studylog->study_time = $request->study_time;
        $studylog->comment = $request->comment;
        $studylog->save();

        // 学習言語
        foreach ($request->language_ids as $language_id) {
            $languageStudylog = new LanguageStudylog();
            $languageStudylog->user_id = $request->user_id;
            $languageStudylog->date = $request->date;
            $languageStudylog->language_id = $language_id;
            $languageStudylog->study_time = $request->study_time / count($request->language_ids);
            $languageStudylog->studylog_id = $studylog->id;
            $languageStudylog->save();
        }

        // 学習コンテンツ
        foreach ($request->content_ids as $content_id) {
            $contentStudylog = new ContentStudylog();
            $contentStudylog->user_id = $request->user_id;
            $contentStudylog->date = $request->date;
            $contentStudylog->content_id = $content_id;
            $contentStudylog->study_time = $request->study_time / count($request->content_ids);
            $contentStudylog->studylog_id = $studylog->id;
            $contentStudylog->save();
        }
    }

    /**
     * プロフィール編集画面表示
     * @return View プロフィール編集画面
     */
    public function show()
    {
        $user = Auth::user();
        return view('webapp.profile', compact('user'));
    }

    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     * @param Request $request
     * @return Redirect 一覧ページ-メッセージ（プロフィール更新完了）
     */
    public function profileUpdate(Request $request)
    {

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('webapp_index');
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('webapp_index');
    }
}
