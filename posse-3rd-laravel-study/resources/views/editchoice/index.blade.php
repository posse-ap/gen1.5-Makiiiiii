<h3>選択肢編集画面</h3>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<h2>新規追加</h2>
<form action="{{ route('editchoice_store', $question_id) }}" method="POST">
    @csrf
    <input type="hidden" name="question_id" value={{ $question_id }}>
    <p>選択肢番号：<input type="number" name="choice_id"></p>
    <p>選択肢：<input type="text" name="name" value="{{old('name')}}"></p>

    <input type="submit" value="登録する">
</form>

<h2>一覧</h2>
<table border="1">
    <tr>
        <th>選択肢</th>
        <th>編集</th>
        <th>削除</th>
        <th>移動</th>
    </tr>
    @foreach ($choices as $choice)
    <tr>
        <td>
            {{ $choice->choice_id }}
            {{ $choice->name }}
        </td>
        <th>
            <a href="{{ route('editchoice_edit', ['question_id'=>$question_id, 'id'=>$choice->id]) }}">編集</a>
        </th>
        <th>
            <form action="{{ route('editchoice_destroy', ['question_id'=>$question_id, 'id'=>$choice->id])}}" method="POST">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question_id }}">
                <input type="hidden" name="id" value="{{ $choice->id }}">
                <input type="submit" name="" value="削除">
            </form>
        </th>
        <th>

        </th>
    </tr>
    @endforeach
</table>