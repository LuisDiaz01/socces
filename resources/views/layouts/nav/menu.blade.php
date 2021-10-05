<a href="{{route('profile-index')}}" class="dropdown-item"><i class="fa fa-user"></i><span>Mi perfil</span></a>
<a href="{{route('logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="dropdown-item">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <i class="dropdown-item-icon fa fa-power-off"></i>
    <span>Logout</span>
</a>