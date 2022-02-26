@section('header')

<header class="bg-white py-3">
    <div class="container header__container mx-auto d-flex justify-content-between">
        <div class="logo d-flex align-items-center">
            <div class="logo__img">
                <img src="https://posse-ap.com/img/posseLogo.png" alt="POSSEのロゴ" class="img-fluid">
            </div>
            <p class="logo__sentence ml-5 mb-0">
                4th week / {{ $user->name }}
            </p>
        </div>
        <button type="button" class="btn btn-primary record d-none d-md-block px-5 py-2 shadow-sm" data-toggle="modal" data-target="#recordRegistrationModalCenter">
            <p class="text-white mb-0">記録・投稿</p>
        </button>
    </div>
</header>

@endsection