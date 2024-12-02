<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <ul class="nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    @if (isset(Auth::user()->profil) && Auth::user()->profil)
                        <img src="{{ asset('storage/' . Auth::user()->profil) }}" class="avatar-img rounded-circle">
                    @else
                        <img src="{{ asset('assets/assets/avatars/face-1.jpg') }}" class="avatar-img rounded-circle">
                    @endif
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <span class="dropdown-item disabled">
                    <strong>{{ Auth::user()->name }}</strong>
                </span>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <span class="fe fe-12 fe-log-out">
                    </span> {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
