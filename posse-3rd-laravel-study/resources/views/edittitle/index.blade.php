<h3>問題タイトル編集画面</h3>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<h2>新規追加</h2>
<form action="{{ route('edittitle.index')}}" method="POST">
    @csrf
    <p>タイトル：<input type="text" name="area" value="{{old('area')}}"></p>
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
        <th>移動</th>
    </tr>
    @foreach ($areas as $area)
    <tr>
        <td>
            <a href="/editquestion/{{ $area->id }}">{{ $area->area }}</a>
            {{ $area->created_at }}
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
            <!-- <form action="{{ route('edittitle.index', $area->id)}}" method="POST">
                @csrf
                @method('PUT')
                <input type="submit" name="list" value="{{ $area->list }}">
            </form> -->
        </th>
    </tr>
    @endforeach
</table>