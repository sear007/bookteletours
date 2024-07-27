<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img id="logo-white" src="{{asset('images/tele_tour_logo_v_w.png')}}" />
      <img id="logo-black" class="d-none" src="{{asset('images/tele_tour_logo_v_b.png')}}" />
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ Request::is('/') ? 'active' : ''}}"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
          <li class="nav-item {{ Request::is('rooms') ? 'active' : ''}}"><a href="{{ route('hotel.index') }}" class="nav-link">Place to stay</a></li>
          <li class="nav-item {{ Request::is('tourism') ? 'active' : ''}}"><a href="{{ route('site.index') }}" class="nav-link">Place to visit</a></li>
          <li class="nav-item {{ Request::is('tours') ? 'active' : ''}}"><a href="{{ route('tour.index') }}" class="nav-link">Things to do</a></li>
          @auth
            <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link btn btn-primary rounded"><i class="fa fa-user"></i></a></li>
          @else
            <li class="nav-item {{ Request::is('login') ? 'active' : ''}} "><a href="{{ route('login') }}" class="nav-link btn btn-primary rounded">Sign In<Inp></Inp></a></li>
          @endauth
        </ul>
      </div>
  </div>
</nav>