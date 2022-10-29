@section('header')
    <header class="bg-white py-3">


        <div class="container header__container mx-auto d-flex justify-content-between">
            <div class="logo d-flex align-items-center">
                <div class="logo__img">
                    <img src="https://posse-ap.com/img/posseLogo.png" alt="POSSEのロゴ" class="img-fluid">
                </div>
                <p class="logo__sentence ml-5 mb-0">
                    4th week
                </p>
            </div>
            <div class="w-min d-flex">
                <button type="button" class="btn btn-primary record d-none d-md-block px-5 py-2 shadow-sm"
                    data-toggle="modal" data-target="#recordRegistrationModalCenter">
                    <p class="text-white mb-0">記録・投稿</p>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="logo__sentence nav-link dropdown-toggle d-block ml-3" href="#"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('webapp_profile_edit') }}">
                                Edit
                            </a>
                            <a class="dropdown-item" href="{{ route('webapp_profile_destroy') }}"
                                onclick="event.preventDefault();
                                                             document.getElementById('destroy-form').submit();">
                                Delete
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <form id="destroy-form" action="{{ route('webapp_profile_destroy') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
@endsection
