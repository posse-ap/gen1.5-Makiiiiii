<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="{{ asset('css/quizy.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quizy</title>

</head>

<body>
    <div class="quiz">
        <h1>
            {{$area['area']}}
        </h1>

        @foreach ($area->questions as $question)
            <div>
                <h3><span>{{$question->id}}.この地名はなんて読む？</span></h3>
                <img src="{{$question->image_path}}">
            </div>
            <ul>
                @foreach ($question->choices as $choice)
                    <li class="list" id="{{$choice->question_id}}_{{$choice->choice_id}}" onclick="judge({{$choice->question_id}},{{$choice->choice_id}})">
                        {{$choice->name}}
                    </li>
                @endforeach
            </ul>

            <div class="torf" id="{{$question->id}}">
                <p id="result{{$question->id}}"></p>
                <p id="resultText{{$question->id}}">正解は「{{$question->id}}」です！</p>
            </div>
        @endforeach
    </div>


    <script src="{{ asset('js/quizy.js') }}"></script>
</body>

</html>