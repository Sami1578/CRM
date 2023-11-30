<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->





    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(auth()->user()->name); ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


















                <?php if(auth()->check() && auth()->user()->hasRole('member')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e((request()->is('')) ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Member Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('myleads.index')); ?>" class="nav-link <?php echo e((request()->is('')) ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            My Leads
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e((request()->is('home')) ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Admin Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('teams.index')); ?>" class="nav-link <?php echo e((request()->is('teams')) ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            All Teams
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('members.index')); ?>" class="nav-link <?php echo e((request()->is('members')) ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            All Team Members
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php echo e(((request()->is('leads')) || (request()->is('leadstages')) ? 'menu-is-opening menu-open' :  '')); ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Leads
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: <?php echo e(((request()->is('leads')) || (request()->is('leadstages')) ? 'block' :  'none')); ?>">
                        <li class="nav-item">
                            <a href="<?php echo e(route('leads.index')); ?>" class="nav-link <?php echo e((request()->is('leads')) ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    All Leads
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('leadstages.index')); ?>" class="nav-link <?php echo e((request()->is('leadstages')) ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    All Lead Stages
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('leadstatus.index')); ?>" class="nav-link <?php echo e((request()->is('leadstatus')) ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    All Lead Status
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('services.index')); ?>" class="nav-link <?php echo e((request()->is('services')) ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Services
                        </p>
                    </a>
                </li>
                <?php endif; ?>




























            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH E:\Sami new\Laravel Projects\cnbcrm.org\cnbcrm.org\resources\views/layouts/sections/sidebar.blade.php ENDPATH**/ ?>