<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
{{--    <a href="index3.html" class="brand-link">--}}
{{--        <img src="{{ asset('assets/img/logo-small.png') }}" alt="OpenGates Logo" class="brand-image img-circle elevation-3"--}}
{{--             style="opacity: .8">--}}
{{--    </a>--}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->profile_pic == null ? asset('assets/img/author/img1.png') : url('/ProfilePics').'/'.Auth::user()->profile_pic }}
                    " alt="profile pic">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->fname}},</a>
            </div>
            <div class="info">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class=""></i>
                    <span> Logout</span>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.categories')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.ads')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Posted Ads
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.users')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Roles
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
