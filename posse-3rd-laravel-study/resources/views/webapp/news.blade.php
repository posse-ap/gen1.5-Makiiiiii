@extends('layout.common')

@include('layout.header')

@section('content')
    <section class="bg-light pb-4">
        <div class="top__back w-100">
            <h1 class="text-center font-weight-bold text-white py-5">Blogs</h1>
        </div>
        <div class="container">
            <div class="mx-auto my-5">
                <p class="text-center font-weight-bold">
                    POSSEメンバーが作成した記事をまとめています。
                </p>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <a href="{{ route('news_detail', ['id' => $post['id']]) }}" class="col-md-4 col-6 mb-3 text-body text-decoration-none">
                        <div class="">
                            <img src="{{ $post['thumbnail_url'] }}" alt="サムネイル" class="w-100">
                        </div>
                        <h2 class="h4 my-3 font-weight-bold">{{ $post['title'] }}</h2>
                        <p>{{ $post['text'] }}</p>

                        <p class="text-center">{{ $post['date'] }}</p>
                    </a>
                @endforeach
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
