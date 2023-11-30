<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
{{--    <a href="../index3.html" class="brand-link">--}}
{{--        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
{{--        <span class="brand-text font-weight-light">AdminLTE 3</span>--}}
{{--    </a>--}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
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
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                        <p>--}}
{{--                            Dashboard--}}
{{--                            <i class="right fas fa-angle-left"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="../index.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Dashboard v1</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </li>--}}
                @role('member')
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{(request()->is('')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Member Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('myleads.index')}}" class="nav-link {{(request()->is('')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            My Leads
                        </p>
                    </a>
                </li>
                @endrole
                @role('admin')
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{(request()->is('home')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Admin Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teams.index') }}" class="nav-link {{(request()->is('teams')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            All Teams
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('members.index') }}" class="nav-link {{(request()->is('members')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            All Team Members
                        </p>
                    </a>
                </li>
                <li class="nav-item {{((request()->is('leads')) || (request()->is('leadstages')) ? 'menu-is-opening menu-open' :  '') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Leads
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: {{((request()->is('leads')) || (request()->is('leadstages')) ? 'block' :  'none') }}">
                        <li class="nav-item">
                            <a href="{{ route('leads.index') }}" class="nav-link {{(request()->is('leads')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    All Leads
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('leadstages.index')}}" class="nav-link {{(request()->is('leadstages')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    All Lead Stages
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('leadstatus.index')}}" class="nav-link {{(request()->is('leadstatus')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    All Lead Status
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('services.index')}}" class="nav-link {{(request()->is('services')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Services
                        </p>
                    </a>
                </li>
                @endrole




{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            URL Structure--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Image Size--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Email Triggers--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
