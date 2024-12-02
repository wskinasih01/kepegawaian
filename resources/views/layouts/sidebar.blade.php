<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ url('dashboard') }}">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100 {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>

            @if (Auth::user()->can('permissions-list') || Auth::user()->can('roles-list') || Auth::user()->can('users-list'))
                <li class="nav-item dropdown">
                    <a href="#manage-user" data-toggle="collapse"
                        aria-expanded="{{ request()->is('permissions*') || request()->is('roles*') || request()->is('users*') ? 'true' : 'false' }}"
                        class="dropdown-toggle nav-link {{ request()->is('permissions*') || request()->is('roles*') || request()->is('users*') ? '' : 'collapsed' }}">
                        <i class="fe fe-user fe-16"></i>
                        <span class="ml-3 item-text">Manage User</span><span class="sr-only">(current)</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100 {{ request()->is('permissions*') || request()->is('roles*') || request()->is('users*') ? 'show' : '' }}"
                        id="manage-user">
                        @can('permissions-list')
                            <li class="nav-item {{ request()->is('permissions*') ? 'active' : '' }}">
                                <a class="nav-link pl-3" href="{{ url('permissions') }}"><span
                                        class="ml-1 item-text">Permission</span></a>
                            </li>
                        @endcan
                        @can('roles-list')
                            <li class="nav-item {{ request()->is('roles*') ? 'active' : '' }}">
                                <a class="nav-link pl-3" href="{{ url('roles') }}"><span
                                        class="ml-1 item-text">Role</span></a>
                            </li>
                        @endcan
                        @can('users-list')
                            <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
                                <a class="nav-link pl-3" href="{{ url('users') }}"><span
                                        class="ml-1 item-text">User</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @if (Auth::user()->can('pendidikan-list') || Auth::user()->can('jabatan-list') || Auth::user()->can('usia-pensiun-list'))
                <li class="nav-item dropdown">
                    <a href="#master-data" data-toggle="collapse"
                        aria-expanded="{{ request()->is('pendidikan*') || request()->is('jabatan*') || request()->is('usia-pensiun*') ? 'true' : 'false' }}"
                        class="dropdown-toggle nav-link {{ request()->is('pendidikan*') || request()->is('jabatan*') || request()->is('usia-pensiun*') ? '' : 'collapsed' }}">
                        <i class="fe fe-folder  fe-16"></i>
                        <span class="ml-3 item-text">Data Master</span><span class="sr-only">(current)</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100 {{ request()->is('pendidikan*') || request()->is('jabatan*') || request()->is('usia-pensiun*') ? 'show' : '' }}"
                        id="master-data">
                        @can('pendidikan-list')
                            <li class="nav-item {{ request()->is('pendidikan*') ? 'active' : '' }}">
                                <a class="nav-link pl-3" href="{{ url('pendidikan') }}"><span
                                        class="ml-1 item-text">Pendidikan</span></a>
                            </li>
                        @endcan
                        @can('jabatan-list')
                            <li class="nav-item {{ request()->is('jabatan*') ? 'active' : '' }}">
                                <a class="nav-link pl-3" href="{{ url('jabatan') }}"><span
                                        class="ml-1 item-text">Jabatan</span></a>
                            </li>
                        @endcan
                        @can('usia-pensiun-list')
                            <li class="nav-item {{ request()->is('usia-pensiun*') ? 'active' : '' }}">
                                <a class="nav-link pl-3" href="{{ url('usia-pensiun') }}"><span class="ml-1 item-text">Usia
                                        Pensiun</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @can('pegawai-list')
                <li class="nav-item w-100 {{ request()->is('pegawai*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('pegawai') }}">
                        <i class="fe fe-file fe-16"></i>
                        <span class="ml-3 item-text">Data Pegawai</span>
                    </a>
                </li>
            @endcan
        </ul>

    </nav>
</aside>
