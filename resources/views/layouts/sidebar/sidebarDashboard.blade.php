<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="{{ asset('assets/images/user.jpg')}}" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
          <p class="designation">
            @if(Auth::user()->hasRole(1))
              Administrador
            @endif
          </p>
        </div>
      </a>
    </li>
    <li class="nav-item nav-category">Menú</li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{route('home')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Inicio</span>
      </a>
    </li>
    @if(Auth::user()->hasRole(1))
      @include('layouts.sidebar.contentAdmin')
    @endif
    <li class="nav-item">
      <a class="nav-link" href="{{ route('profile-index') }}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Perfil</span>
      </a>
    </li>
    <li class="nav-item"> 
        <a href="{{route('logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="nav-link">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Logout</span>
        </a>
    </li>
  </ul>
</nav>