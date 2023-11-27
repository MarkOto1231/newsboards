<div class="global-navbar">
  <div class="container">
    <div class="row">
      <div class="col-md-3 d-none d-sm d-md-inline">
        
      </div>

      

  </div>
</div>

<div class="sticky-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-green">
    <div class="container">
      <a href="" class="navbar-brand d-inline d-inline d-md-none">
        <img src="{{asset('images/logo.png')}}" style="width: 50px;" alt="Logo">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/front')}}">Home</a>
          </li>

          <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>-->

          @php
          $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
          @endphp
          @foreach ($categories as $cateitem)
          <li class="nav-item">
            <a class="nav-link" href="{{ url('event/'.$cateitem -> slug) }}">{{$cateitem -> name}}</a>
          </li>
          @endforeach
          @if (Auth::check())
          <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown " style="text-align: right;">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                       
                        <li><a class="dropdown-item" href="{{url('admin/dashboard')}}">{{ Auth::user()->name }}</a></li>
                        <li><hr class="dropdown-divider" /></li>

                        <li>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>

                    </ul>
                </li>
            </ul>
          @else
          <a class="nav-link btn btn-primary" href="{{'/login'}}">Login</a>
          @endif
        </ul>
      </div>

    </div>
  </nav>
</div>