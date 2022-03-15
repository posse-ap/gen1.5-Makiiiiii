<h1>設問編集画面</h1>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<a href="{{ route('edittitle.index')}}">タイトル編集画面へ</a>

<h2>新規追加</h2>
<form action="{{ route('editquestion_store', $area_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="area_id" value={{$area_id}}>
    {{-- <p>設問画像：<input type="text" name="image_path" value="{{ old('image_path') }}"></p> --}}
    <p>設問画像：<input type="file" id="file" name="image_path" class="form-control"></p>
    <p>順番：<input type="number" name="list" value="{{ old('list') }}"></p>
    <input type="submit" value="登録する">
</form>

<h2>一覧</h2>
<table border="1">
    <tr>
        <th>設問画像</th>
        <th>編集</th>
        <th>削除</th>
        <th>上に移動</th>
        <th>下に移動</th>
    </tr>
    @foreach ($questions as $question)
    <tr>
        <td>
            <a href="{{ route('editchoice_index', ['question_id'=>$question->id]) }}">
                <img src="{{ $question->image_path }}" class="w-25">
            </a>
            {{ $question->image_path }}
            {{ $question->list }}
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
            <form action="{{ route('editquestion_list', $area_id)}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $question->id }}">
                <input type="hidden" name="image_path" value="{{ $question->image_path }}">
                <input type="hidden" name="area" value="{{ $question->name }}">
                <input type="hidden" name="list" value="{{ $question->list - 1 }}">
                <input type="submit" value="up">
            </form>
        </th>
        <th>
            <form action="{{ route('editquestion_list', $area_id)}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $question->id }}">
                <input type="hidden" name="image_path" value="{{ $question->image_path }}">
                <input type="hidden" name="area" value="{{ $question->name }}">
                <input type="hidden" name="list" value="{{ $question->list + 1 }}">
                <input type="submit" value="down">
            </form>
        </th>
    </tr>
    @endforeach
    {{-- <img src="{{ asset('storage/スクリーンショット 2022-01-29 14.22.02.png') }}" width="100" height="100"> --}}
</table>