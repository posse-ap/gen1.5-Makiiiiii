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
    public function index() {

        // ユーザー
        $user = Auth::user();
        
        // 日付関連
		$dt_from = Carbon::now()->startOfMonth();
		$dt_to = Carbon::now()->endOfMonth();
		$today = Carbon::now()->format('Y-m-d');
        $lastdate = Carbon::now()->endOfMonth()->format('d');

        // 学習時間の表示・グラフ
        $todayStudylogs = Studylog::where('date', $today)->get();
		$thismonthStudylogs = Studylog::whereBetween('date', [$dt_from, $dt_to])->selectRaw('SUM(study_time) AS study_time, date')->groupBy('date')->get();
		$totalStudylogs = Studylog::all();
        
        // 学習言語のグラフ
        $languages = Language::all();
        $thismonthLanguages = LanguageStudylog::whereBetween('date', [$dt_from, $dt_to])
        ->selectRaw('SUM(study_time) AS study_time, language_id')
        ->orderBy('language_id')
        ->groupBy('language_id')->get();
        
        // 学習コンテンツのグラフ
        $contents = Content::all();
        $thismonthContents = ContentStudylog::whereBetween('date', [$dt_from, $dt_to])->selectRaw('SUM(study_time) AS study_time, content_id')->orderBy('content_id')->groupBy('content_id')->get();

        return view('webapp.index', compact('todayStudylogs', 'thismonthStudylogs', 'totalStudylogs', 'lastdate', 'languages', 'thismonthLanguages', 'contents', 'thismonthContents', 'user'));
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
        Studylog::create($form);
        return redirect()->route('webapp_index');
    }
}
