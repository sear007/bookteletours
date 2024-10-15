<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('home')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('hotel.index')}}" class="nav-link">Place to stay</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('site.index')}}" class="nav-link">Place to visit</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">
                <i class="fas fa-power-off"></i>
            </a>
        </li>
    </ul>
</nav>