<h1>問題タイトル編集画面</h1>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<h2>新規追加</h2>
<form action="{{ route('edittitle.index')}}" method="POST">
    @csrf
    <p>タイトル：<input type="text" name="area" value="{{old('area')}}"></p>
    <p>順番：<input type="number" name="list" value="{{old('list')}}"></p>
    <input type="submit" value="登録する">
</form>

<!-- <h2>並び替え</h2>
<form action="{{route('edittitle.index')}}">
    <button type="submit" name="sort" value="@if (!isset($sort) || $sort !== '1') 1 @elseif ($sort === '1') 2 @endif">作成日順</button>
    <button type="submit" name="sort" value="@if (!isset($sort) || $sort !== '3') 3 @elseif ($sort === '3') 4 @endif">あいうえお順</button>
</form> -->

<h2>一覧</h2>
<table border="1">
    <tr>
        <th>タイトル</th>
        <th>編集</th>
        <th>削除</th>
        <th>上に移動</th>
        <th>下に移動</th>
    </tr>
    @foreach ($areas as $area)
    <tr>
        <td>
            <a href="/editquestion/{{ $area->id }}">{{ $area->area }}</a>
            {{ $area->list }}
        </td>
        <th>
            <a href="{{ route('edittitle.edit',$area->id)}}">編集</a>
        </th>
        <th>
            <form action="{{ route('edittitle.destroy', $area->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="" value="削除">
            </form>
        </th>
        <th>
            <form action="{{ route('edittitle_list', $area->id)}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $area->id }}">
                <input type="hidden" name="area" value="{{ $area->area }}">
                <input type="hidden" name="list" value="{{ $area->list - 1 }}">
                <input type="submit" value="up">
            </form>
        </th>
        <th>
            <form action="{{ route('edittitle_list')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $area->id }}">
                <input type="hidden" name="area" value="{{ $area->area }}">
                <input type="hidden" name="list" value="{{ $area->list + 1 }}">
                <input type="submit" value="down">
            </form>
        </th>
    </tr>
    @endforeach
</table>