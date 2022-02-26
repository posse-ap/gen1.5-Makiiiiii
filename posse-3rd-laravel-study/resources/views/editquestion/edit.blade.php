<h1>編集画面</h1>
<p><a href="{{ route('editquestion_index', $area_id)}}">一覧画面</a></p>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<form action="{{ route('editquestion_update', ['area_id'=>$area_id, 'id'=>$question->id])}}" method="POST">
    @csrf
    <input type="hidden" name="area_id" value="{{ $area_id }}">
    <input type="hidden" name="id" value="{{ $question->id }}">
    <p>
      設問画像：
      <input type="text" name="image_path" value="{{ $question->image_path }}">
    </p>
    <image src="{{ $question->image_path }}"></image>
    <input type="submit" value="編集する">
</form>