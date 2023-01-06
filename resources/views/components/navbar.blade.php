<!-- Navbar -->

@php
$change="bg-white navbar-light shadow sticky-top";

@endphp
<nav id="nav"
  class="navbar pb-3 pt-2 navbar-expand-lg  @if(request()->routeIs('home')) lightMode bg-white-mode fixed-top navbar-dark @else {{$change}} @endif">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <img src="{{asset('images/logo.png')}}" height="50" width="30" alt="" loading="lazy" style="margin-top: -1px;" />



    </a>
    <h3 id="brand"
      class="navbar-brand  mr-lg-3 text-2xl font-bold  @if(request()->routeIs('home'))   @else  text-dark @endif">
      BIBLIOTHEQUE</h3>


    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse " id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav ms-auto mb-2 mr-lg-2 mb-lg-0">
        <li class="nav-item  @if(request()->routeIs('home')) actives @endif">
          <a class="nav-link " href="{{route('home')}}">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Travaux</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Recherche</a>
        </li>
        <li class="nav-item @if(request()->routeIs('consultation')) actives @endif">
          <a class="nav-link" href="{{route('consultation')}}">Consulter</a>
        </li>
        <li class="nav-item @if(request()->routeIs('publication')) actives @endif ">
          <a class="nav-link" href="{{route('publication')}}">Publier</a>
        </li>


      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center ms-lg-5  ml-lg-2">


        @auth
        <div class="btn-group ">

          <button id="userName" type="button " class="navbar-brand text @if(request()->routeIs('home')) text-light @else text-dark @endif btn dropdown-toggle
            dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="text-reset">{{Auth::user()->name}}</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
            <a class="dropdown-item" href="">Profile</a>

            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="post">
              @csrf

              <button type="submit" class="dropdown-item" href="#">Logout</button>
            </form>
          </div>
        </div>

        @else
        <a href="{{route('login')}}" class="btn btn-warning px-3 me-2">
          Login
        </a>
        <a href="{{route('register')}}" class="text-white btn btn-primary me-3">
          Register
        </a>
        @endauth

      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->