<nav class="navbar navbar-nav ml-auto navbar-expand-lg shadow-sm fixed-top navbar-light bg-white">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a href="{{route('landing')}}" class="navbar-brand"><i class="fa fa-book"></i>Költők<b>klubbja</b></a>
            <ul class="navbar-nav ml-auto w-100 mb-2 mb-lg-0">
                <a href="{{route('landing')}}" class="nav-item nav-link d-flex"> <i
                        class="fas fa-home mx-2 d-block"></i>Főoldal</a>
                <a href="{{route('poems')}}" class="nav-item nav-link d-flex"><i class="fas fa-book mx-2 d-block"></i>
                    Versek</a>

                @auth
                <a href="{{route('user-poems.index')}}" class="nav-item nav-link d-flex"><i
                        class="fas fa-pen-fancy mx-2 d-block"></i> Verseim</a>
                @endauth

                @guest
                <div class="w-100 justify-content-end navbar-nav ml-auto">
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><b>Bejelentkezés</b></a>
                    </li>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="btn btn-primary p-2 px-4" href="{{ route('register') }}"><b>Regisztráció</b></a>
                    </li>
                    @endif
                </div>
                @endguest

                @auth
                <div class="w-100 justify-content-end navbar-nav ml-auto">
                    <a 
                    href="{{route('notifications')}}" 
                    class="nav-item nav-link notifications">
                        <i class="fa fa-bell-o"></i>
                        @if(count(Auth::user()->unreadNotifications) > 0)
                            <span class="badge">{{count(Auth::user()->unreadNotifications)}}</span>
                        @endif
                    </a>

                    <div class="dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} {{Auth::user()->second_name }}
                        </a>
                        <ul class="dropdown-menu  border-0 shadow rounded" aria-labelledby="navbarDropdown">
                            <a href="{{route('profile.index')}}" class="dropdown-item"><i class="fas fa-user"></i> Profil</a>
                            <a href="{{route('reports.index')}}" class="dropdown-item"><i class="fas fa-bug"></i> Hiba
                                bejelentése</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Kilépés
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>