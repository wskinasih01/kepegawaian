<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?php echo e(url('dashboard')); ?>">
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
            <li class="nav-item w-100 <?php echo e(request()->is('dashboard') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('dashboard')); ?>">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>

            <?php if: ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions-list' || @can('roles-list') || @can('users-list'))): ?>
            <li class="nav-item dropdown">
                <a href="#manage-user" data-toggle="collapse"
                    aria-expanded="<?php echo e(request()->is('permissions*') || request()->is('roles*') || request()->is('users*') ? 'true' : 'false'); ?>"
                    class="dropdown-toggle nav-link <?php echo e(request()->is('permissions*') || request()->is('roles*') || request()->is('users*') ? '' : 'collapsed'); ?>">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Manage User</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100 <?php echo e(request()->is('permissions*') || request()->is('roles*') || request()->is('users*') ? 'show' : ''); ?>"
                    id="manage-user">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions-list')): ?>
                        <li class="nav-item <?php echo e(request()->is('permissions*') ? 'active' : ''); ?>">
                            <a class="nav-link pl-3" href="<?php echo e(url('permissions')); ?>"><span
                                    class="ml-1 item-text">Permission</span></a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles-list')): ?>
                        <li class="nav-item <?php echo e(request()->is('roles*') ? 'active' : ''); ?>">
                            <a class="nav-link pl-3" href="<?php echo e(url('roles')); ?>"><span class="ml-1 item-text">Role</span></a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users-list')): ?>
                        <li class="nav-item <?php echo e(request()->is('users*') ? 'active' : ''); ?>">
                            <a class="nav-link pl-3" href="<?php echo e(url('users')); ?>"><span
                                    class="ml-1 item-text">User</span></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php endif; ?>

        <li class="nav-item dropdown">
            <a href="#master-data" data-toggle="collapse"
                aria-expanded="<?php echo e(request()->is('pendidikan*') || request()->is('jabatan*') || request()->is('usia-pensiun*') ? 'true' : 'false'); ?>"
                class="dropdown-toggle nav-link <?php echo e(request()->is('pendidikan*') || request()->is('jabatan*') || request()->is('usia-pensiun*') ? '' : 'collapsed'); ?>">
                <i class="fe fe-folder  fe-16"></i>
                <span class="ml-3 item-text">Data Master</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100 <?php echo e(request()->is('pendidikan*') || request()->is('jabatan*') || request()->is('usia-pensiun*') ? 'show' : ''); ?>"
                id="master-data">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pendidikan-list')): ?>
                    <li class="nav-item <?php echo e(request()->is('pendidikan*') ? 'active' : ''); ?>">
                        <a class="nav-link pl-3" href="<?php echo e(url('pendidikan')); ?>"><span
                                class="ml-1 item-text">Pendidikan</span></a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jabatan-list')): ?>
                    <li class="nav-item <?php echo e(request()->is('jabatan*') ? 'active' : ''); ?>">
                        <a class="nav-link pl-3" href="<?php echo e(url('jabatan')); ?>"><span
                                class="ml-1 item-text">Jabatan</span></a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usia-pensiun-list')): ?>
                    <li class="nav-item <?php echo e(request()->is('usia-pensiun*') ? 'active' : ''); ?>">
                        <a class="nav-link pl-3" href="<?php echo e(url('usia-pensiun')); ?>"><span class="ml-1 item-text">Usia
                                Pensiun</span></a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pegawai-list')): ?>
            <li class="nav-item w-100 <?php echo e(request()->is('pegawai*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('pegawai')); ?>">
                    <i class="fe fe-file fe-16"></i>
                    <span class="ml-3 item-text">Data Pegawai</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>

</nav>
</aside>
<?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views\layouts\sidebar.blade.php ENDPATH**/ ?>