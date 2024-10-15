<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('images/tele_tour.png')}}" />
    </a>
    <!-- <a href="{{route('home')}}" class="brand-link brand-link-mini">T<span>T</span></a> -->
    <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->avatar}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <span class="text-white d-block">{{auth()->user()->name}}</span>
        </div>
      </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Booking</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('profile')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-power-off text-danger"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>