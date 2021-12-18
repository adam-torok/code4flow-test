

<nav class="navbar navbar-expand-xl fixed-top navbar-light bg-light">
	<a href="{{route('landing')}}" class="navbar-brand"><i class="fa fa-book"></i>Költők<b>klubbja</b></a>
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-between">
		<div class="navbar-nav">
			<a href="{{route('landing')}}" class="nav-item nav-link active">Főoldal</a>
			<a href="#" class="nav-item nav-link">Rólunk</a>
			<a href="#" class="nav-item nav-link">Versek</a>
		</div>
	
    <div class="navbar-nav ml-auto">
      @guest
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
        @else
        <li class="ml-auto d-flex nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>

          <a href="#" class="nav-item nav-link notifications"><i class="fa fa-bell-o"></i><span class="badge">1</span></a>
          <a href="#" class="nav-item nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge">10</span></a></a>
    
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
            <a href="#" class="dropdown-item"><i class="fa fa-calendar-o"></i> Calendar</a></a>
            <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
        @endguest
    </div>
	</div>
</nav>