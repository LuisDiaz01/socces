<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo text-lead text-white rebel" style="font-size:1cm" href="{{ route('home') }}">Soccer</a>
    <a class="navbar-brand brand-logo-mini text-white rebel" style="font-size:.7cm" href="{{ route('home') }}">SCR</a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <ul class="navbar-nav ml-auto">
      @if(Auth::user()->hasRole(4))
        <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
          <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-bell-outline"></i>
            <span class="count">{{ $notification->count() }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
            @include('layouts.nav.notification')
          </div>
        </li>
      @endif
      <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="{{ asset('assets/images/user.jpg')}}" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-md rounded-circle" src="{{ asset('assets/images/user.jpg')}}" alt="Profile image">
            <p class="mb-1 mt-3 font-weight-semibold">{{Auth::user()->name}}  {{Auth::user()->lastname}}</p>
            <p class="font-weight-light text-muted mb-0">{{Auth::user()->email}}</p>
          </div>
          @include('layouts.nav.menu')
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>