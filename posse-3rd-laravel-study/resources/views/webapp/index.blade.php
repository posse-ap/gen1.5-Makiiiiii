@extends('layout.common')

@include('layout.header')

@section('content')
    <section class="bg-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <div class="display d-flex justify-content-between mb-3">
                        <div class="display__time bg-white p-3 shadow-sm">
                            <p class="display__time__when">Today</p>
                            <p class="display__time__number">{{ $todayStudylogs->sum('study_time') }}</p>
                            <p class="display__time__unit">hour</p>
                        </div>
                        <div class="display__time bg-white mx-3 p-3 shadow-sm">
                            <p class="display__time__when">Month</p>
                            <p class="display__time__number">{{ $thismonthStudylogs->sum('study_time') }}</p>
                            <p class="display__time__unit">hour</p>
                        </div>
                        <div class="display__time bg-white p-3 shadow-sm">
                            <p class="display__time__when">Total</p>
                            <p class="display__time__number">{{ $totalStudylogs->sum('study_time') }}</p>
                            <p class="display__time__unit">hour</p>
                        </div>
                    </div>
                    <div class="graph bg-white p-4 shadow-sm">
                        <canvas id="barGraph"></canvas>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-between">
                    <div class="donut graph bg-white p-3 p-lg-4 mr-3 shadow-sm">
                        <p class="font-weight-bold">学習言語</p>
                        <div class="w-75 mx-auto my-3">
                            <canvas id="language"></canvas>
                        </div>
                        <ul class="label pl-0">
                            @foreach ($languages as $language)
                                <li>{{ $language->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="donut graph bg-white p-3 p-lg-4 shadow-sm">
                        <p class="font-weight-bold">学習コンテンツ</p>
                        <div class="w-75 mx-auto my-3">
                            <canvas id="contents"></canvas>
                        </div>
                        <ul class="label pl-0">
                            @foreach ($contents as $content)
                                <li>{{ $content->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="container">
        <div id="tweet-area" class="bg-danger"></div>
        <div class="d-flex font-weight-bold justify-content-center">
            <p class="previous">＜</p>
            <p class="mx-3">{{ $thisMonth }}</p>
            <p class="following">＞</p>
        </div>
        <button type="button" class="btn btn-primary footer__record d-md-none px-5 py-2 my-4 shadow-sm" data-toggle="modal"
            data-target="#recordRegistrationModalCenter">
            <p class="text-white mb-0">記録・投稿</p>
        </button>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="recordRegistrationModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="recordRegistrationModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal__area" role="document">
            <div class="modal-content container modal__content">
                <div class="modal-header pb-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <form action="{{ route('webapp_store') }}" method="POST"> --}}
                    <form>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div id="modalReplace" class="row pt-0">
                            <div class="col-12 col-md-6">
                                <div>
                                    <label for="studyDate">学習日</label>
                                    <input class="flatpickr studyInput" type="text" id="studyDate" name="date">
                                </div>
                                <div class="mt-4">
                                    <label for="">学習コンテンツ（複数選択可）</label>
                                    <ul class="contents pl-0">
                                        @foreach ($contents as $content)
                                            <li onclick="check('contents{{ $content->id }}')">
                                                <label class="contents__label py-1 px-3 d-flex align-items-center">
                                                    <input type="checkbox" class="contents__label__input m-0"
                                                        id="contents{{ $content->id }}" name="content_id"
                                                        value="{{ $content->id }}">
                                                    <span class="contents__label__dummy">
                                                    </span>
                                                    <span class="contents__label__text d-block">
                                                        {{ $content->name }}
                                                    </span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="mt-4">
                                    <label for="">学習言語（複数選択可）</label>
                                    <ul class="contents pl-0">
                                        @foreach ($languages as $language)
                                            <li onclick="check('language{{ $language->id }}')">
                                                <label class="contents__label py-1 px-3 d-flex align-items-center">
                                                    <input type="checkbox" class="contents__label__input m-0"
                                                        id="language{{ $language->id }}" name="language_id"
                                                        value="{{ $language->id }}">
                                                    <span class="contents__label__dummy">
                                                    </span>
                                                    <span class="contents__label__text d-block">
                                                        {{ $language->name }}
                                                    </span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-2 mt-md-0">
                                    <label for="studyHour">学習時間</label>
                                    <input type="text" id="studyHour" name="study_time" class="studyInput">
                                </div>
                                <div class="mt-4">
                                    <label for="comment">Twitter用コメント</label>
                                    <textarea id="comment" name="comment" class="studyInputTextarea"></textarea>
                                </div>
                                <div class="mt-4">
                                    <label class="contents__label py-1 d-flex align-items-center bg-white">
                                        <input class="contents__label__input m-0" type="checkbox" id="twitterCheck">
                                        <span class="contents__label__dummy">
                                        </span>
                                        <span class="contents__label__text d-block ml-1">
                                            Twitterにシェアする
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary record cpl-12 col-md-6 px-5 py-2 mx-auto my-4 shadow-sm"
                                data-toggle="modal" data-target="#postModalCenter" id="submit">
                                <p class="text-white mb-0 mx-5">記録・投稿</p>
                            </button>
                        </div>
                    </form>

                    <!-- ローディング画面 -->
                    <div class="h-100">
                        <div class="loader" id="loader">Loading...</div>
                    </div>

                    <!-- 完了画面 -->
                    <div class="awesome mx-auto" id="awesome">
                        <p class="awesome__sentence">AWESOME!</p>
                        <div class="awesome__checked my-3">
                            <p class="awesome__checked__mark"></p>
                        </div>
                        <p>
                            記録・投稿<br>
                            完了しました
                        </p>
                    </div>

                    <!-- エラー画面 -->
                    <div class="error mx-auto" id="error">
                        <p class="error__sentence">ERROR</p>
                        <div class="error__exclamation my-3">
                            <p class="error__exclamation__mark">！</p>
                        </div>
                        <p>
                            一時的にご利用出来ない状態です。<br>
                            しばらく経ってから<br>
                            再度アクセスしてください。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        // 棒グラフ 縦軸・横軸のデータ作成
        // var thismonthStudylogs = @json($thismonthStudylogs);
        // var lastdate = @json($lastdate);

        let timeArray = [];
        let dateArray = [];
        let counter = 0;

        @for ($i = 1; $i <= $lastdate; $i++)
            @foreach ($thismonthStudylogs as $studylog)
                @if ($studylog->date->format('d') == $i)
                    timeArray.push({{ $studylog->study_time }});
                @else
                    ++counter;
                @endif

                @if ($loop->last)
                    if (counter == {{ $thismonthStudylogs->count() }}) {
                        timeArray.push(0);
                    };
                    counter = 0;
                @endif
            @endforeach

            dateArray.push({{ $i }});
        @endfor

        // 学習言語グラフ 言語名・色と学習時間
        let languageNameArray = [];
        let languageColorArray = [];

        @foreach ($languages as $language)
            languageNameArray.push('{{ $language->name }}');
            languageColorArray.push('{{ $language->color }}');
        @endforeach

        let languageData = [];
        let languageCounter = 0;

        @for ($i = 1; $i <= $languages->count(); $i++)
            @foreach ($thismonthLanguages as $thismonthLanguage)
                @if ($thismonthLanguage->language_id == $i)
                    languageData.push({{ $thismonthLanguage->study_time }});
                @else
                    ++languageCounter;
                @endif

                @if ($loop->last)
                    if (languageCounter == {{ $thismonthLanguages->count() }}) {
                        languageData.push(0);
                    };
                    languageCounter = 0;
                @endif
            @endforeach
        @endfor

        // 学習コンテンツグラフ コンテンツ名・色と学習時間
        let contentNameArray = [];
        let contentColorArray = [];

        @foreach ($contents as $content)
            contentNameArray.push('{{ $content->name }}');
            contentColorArray.push('{{ $content->color }}');
        @endforeach

        let contentData = [];
        let contentCounter = 0;

        @for ($i = 1; $i <= $contents->count(); $i++)
            @foreach ($thismonthContents as $thismonthContent)
                @if ($thismonthContent->content_id == $i)
                    contentData.push({{ $thismonthContent->study_time }});
                @else
                    ++contentCounter;
                @endif

                @if ($loop->last)
                    if (contentCounter == {{ $thismonthContents->count() }}) {
                        contentData.push(0);
                    };
                    contentCounter = 0;
                @endif
            @endforeach
        @endfor

        // Ajax処理
        $(function() {

            var $modalReplace = $("#modalReplace");
            var $loader = $("#loader");
            var $awesome = $("#awesome");
            var $error = $("#error");

            $('#submit').on('click', function() {

                var user_id = $('input[name="user_id"]').val();
                var date = $('input[name="date"]').val();
                var study_time = $('input[name="study_time"]').val();
                var language_ids = $('input[name=language_id]:checked').map(function() {
                    return $(this).val();
                }).get();
                var content_ids = $('input[name=content_id]:checked').map(function() {
                    return $(this).val();
                }).get();
                var comment = $('input[name="comment"]').val();

                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/studylog_post',
                        type: 'POST',
                        data: {
                            user_id: user_id,
                            date: date,
                            study_time: study_time,
                            language_ids: language_ids,
                            content_ids: content_ids,
                            comment: comment,
                        },
                        beforeSend: function() {
                            $modalReplace.css("display", "none");
                            $loader.css("display", "block");
                        },
                    })
                    // Ajaxリクエストが成功した場合
                    .done(function() {
                        let twitterCheck = document.getElementById('twitterCheck');
                        if (twitterCheck.checked) {
                            tweet();
                        }
                        $loader.css("display", "none");
                        $awesome.css("display", "block");
                    })
                    // Ajaxリクエストが失敗した場合
                    .fail(function(data, xhr, err) {
                        $loader.css("display", "none");
                        $error.css("display", "block");
                        console.log("失敗");
                        console.log(err);
                        console.log(xhr);
                    });
                return false;
            })
        });
    </script>
@endsection
