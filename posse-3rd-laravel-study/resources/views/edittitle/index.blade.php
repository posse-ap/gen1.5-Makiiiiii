<h1>一覧画面</h1>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<h2>新規追加</h2>
<form action="{{ route('edittitle.index')}}" method="POST">
    @csrf
    <p>タイトル：<input type="text" name="area" value="{{old('area')}}"></p>
    <input type="submit" value="登録する">
</form>

<table border="1">
    <tr>
        <th>タイトル</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @foreach ($areas as $area)
    <tr>
        <td>
            {{ $area->area }}

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
    </tr>
    @endforeach
</table>