<h1>編集画面</h1>
<p><a href="{{ route('edittitle.index')}}">一覧画面</a></p>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<form action="{{ route('edittitle.update',$area->id)}}" method="POST">
    @csrf
    @method('PUT')
    <p>タイトル：<input type="text" name="area" value="{{ $area->area }}"></p>
    <input type="submit" value="編集する">
</form>