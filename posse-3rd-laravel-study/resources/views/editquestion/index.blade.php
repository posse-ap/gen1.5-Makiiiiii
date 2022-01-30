<h3>設問編集画面</h3>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<h2>新規追加</h2>
<form action="{{ route('editquestion_store', $area_id) }}" method="POST">
    @csrf
    <input type="hidden" name="area_id" value={{$area_id}}>
    <p>設問画像：<input type="text" name="image_path" value="{{old('image_path')}}"></p>
    <input type="submit" value="登録する">
</form>

<h2>一覧</h2>
<table border="1">
    <tr>
        <th>設問画像</th>
        <th>編集</th>
        <th>削除</th>
        <th>移動</th>
    </tr>
    @foreach ($questions as $question)
    <tr>
        <td>
            <a href="{{ route('editchoice_index', ['question_id'=>$question->id]) }}">
                <image src="{{ $question->image_path }}" class="w-25"></image>
            </a>
            {{ $question->image_path }}
            {{ $question->created_at }}
        </td>
        <th>
            <a href="{{ route('editquestion_edit', ['area_id'=>$area_id, 'id'=>$question->id]) }}">編集</a>
        </th>
        <th>
            <form action="{{ route('editquestion_destroy', ['area_id'=>$area_id, 'id'=>$question->id])}}" method="POST">
                @csrf
                <input type="hidden" name="area_id" value="{{ $area_id }}">
                <input type="hidden" name="id" value="{{ $question->id }}">
                <input type="submit" name="" value="削除">
            </form>
        </th>
        <th>

        </th>
    </tr>
    @endforeach
</table>