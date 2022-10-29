@extends('layout.common')

@include('layout.header')

@section('content')
    <section class="bg-light py-4">
        <div class="container">
            <div class="mx-auto m-5">
                <div>
                    <div class="pt-2">
                        <p class="h3 border-bottom border-secondary pb-3">プロフィール編集</p>
                    </div>
                    <form action="{{ route('webapp_profile_edit') }}" method="POST">
                        @csrf
                        <div class="m-3">
                            <div class="form-group pt-1">
                                <label for="ユーザー名">
                                    <input type="text" name="name" value="{{ $user->name }}">
                                </label>
                            </div>
                            <div class="form-group pt-2">
                                <label for="ユーザーアドレス">
                                    <input type="email" name="email" value="{{ $user->email }}">
                                </label>
                            </div>
                            <div class="form-group pt-2">
                                <label for="パスワード">
                                    <input type="password" name="password">
                                </label>
                            </div>
                            <div class="form-group pull-right">
                                <input type="submit" value="編集する">
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
