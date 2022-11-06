@extends('layout.common')

@include('layout.header')

@section('content')
    <section class="bg-white pb-4">
        <div class="w-100 h-75">
            <img src="{{ $news['thumbnail_url'] }}" alt="サムネイル" class="w-100 thumbnail">
        </div>
        <div class="container">
            <div class="my-5">
                <h1 class="font-weight-bold">{{ $news['title'] }}</h1>
                <p class="my-4">{{ $news['text'] }}</p>
            </div>

            <h2 class="bg-light border-left py-3 font-weight-bold pl-3 h4">筆者のプロフィール</h2>
            <div class="d-flex p-3">
                <div class="">
                    <img src="{{ $news['author']['picture_url'] }}" alt="" width="150px" height="150px"
                        class="d-block">
                </div>
                <p class="p-5 h2">名前：{{ $news['author']['name'] }}</p>
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
