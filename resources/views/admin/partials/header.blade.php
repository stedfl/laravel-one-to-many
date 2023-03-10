<header>
    <nav class="navbar navbar-expand-md shadow-sm h-100">
        <div class="container">
            @guest()
                <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                    <div class="logo">
                        <img src="{{Vite::asset('resources/img/logo.png')}}" alt="logo">
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>
            @endguest
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i
                                class="fa-solid fa-earth-americas icon me-1"></i> {{ __('Sito Pubblico') }}</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item me-5">
                            <form class="dropdown-item d-flex" action="{{ route('admin.projects.index') }}" method="GET">
                                @csrf
                                <input type="text"
                                    class="form-control @error('client_name') is-invalid @enderror nav-link"
                                    name="project_name" id="project_name" placeholder="Cerca il progetto per nome">
                                <button type="submit" class="btn btn-info ms-2">Cerca</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} <i class="fa-solid fa-right-from-bracket icon ms-1"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
