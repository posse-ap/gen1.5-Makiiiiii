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
                        <p class="h3 border-bottom border-secondary pb-3">ユーザー新規登録</p>
                    </div>
                    <form action="{{ route('admin_user_store') }}" method="POST">
                        @csrf
                        <div>
                            <div class="form-group pt-1">
                                <label>
                                    ユーザー名：<input type="text" name="name" value="{{ old('name') }}">
                                </label>
                            </div>
                            <div class="form-group pt-2">
                                <label>
                                    メールアドレス：<input type="email" name="email" value="{{ old('email') }}">
                                </label>
                            </div>
                            <div class="form-group pt-2">
                                <label>
                                    パスワード：<input type="password" name="password" value="{{ old('password') }}">
                                </label>
                            </div>
                            <div class="form-group pt-2">
                                <label>
                                    管理者ユーザー：
                                    <label><input type="radio" name="is_admin" value="1">管理者ユーザー</label>
                                    <label><input type="radio" name="is_admin" value="0">一般ユーザー</label>
                                </label>
                            </div>
                            <div class="form-group pull-right">
                                <input type="submit" value="登録する">
                            </div>
                        </div>
                    </form>
                </div>
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
