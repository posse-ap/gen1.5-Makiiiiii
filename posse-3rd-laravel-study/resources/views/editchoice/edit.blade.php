<h1>編集画面</h1>
<p><a href="{{ route('editchoice_index', $question_id)}}">一覧画面</a></p>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<form action="{{ route('editchoice_update', ['question_id'=>$question_id, 'id'=>$choice->id])}}" method="POST">
    @csrf
    <input type="hidden" name="question_id" value="{{ $question_id }}">
    <input type="hidden" name="id" value="{{ $choice->id }}">
    <p>
      選択肢：
      <input type="text" name="name" value="{{ $choice->name }}">
    </p>
    <input type="submit" value="編集する">
</form>