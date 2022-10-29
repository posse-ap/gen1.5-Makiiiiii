@extends('layout.common')

@include('layout.admin_header')

@section('content')
    <section class="bg-light py-4">
        <div class="container">
            <div class="mx-auto m-5">
                @if ($message = Session::get('success'))
                    <p>{{ $message }}</p>
                @endif
                <div>
                    <div class="mt-2">
                        <p class="h3 border-bottom border-secondary pb-3">学習コンテンツ</p>
                    </div>
                    <div class="mt-5">
                        <p class="h4 border-secondary pb-3">新規登録</p>
                    </div>
                    <form action="{{ route('admin_content_store') }}" method="POST">
                        @csrf
                        <div>
                            <div class="form-group pt-1">
                                <label for="言語名">
                                    コンテンツ名：<input type="text" name="name" value="{{ old('name') }}">
                                </label>
                            </div>
                            <div class="form-group pt-2">
                                <label for="色">
                                    色：<input type="text" name="color" value="{{ old('color') }}">
                                </label>
                            </div>
                            <div class="form-group pull-right">
                                <input type="submit" value="登録する">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mt-5">
                    <p class="h4 border-secondary pb-3">一覧</p>
                </div>
                <table border="1">
                    <tr>
                        <th>言語名</th>
                        <th>色</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                    @foreach ($contents as $content)
                        <tr>
                            <td>
                                <p>{{ $content->name }}</p>
                            </td>
                            <th>
                                <p>{{ $content->color }}</p>
                            </th>
                            <th>
                                <a href="{{ route('admin_content_edit', $content->id) }}">編集</p>
                            </th>
                            <th>
                                <form action="{{ route('admin_content_destroy')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value={{ $content->id }}>
                                    <input type="submit" value="削除">
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
@endsection
