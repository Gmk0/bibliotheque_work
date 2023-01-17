<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('images/logo2.png')}}" width="50" alt="" class="brand-image  elevation-2" style="opacity: .8">
        <span class="brand-text font-weight-light">BIBLIOTHEQUE UCC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
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
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="#"
                        class="nav-link @if(request()->routeIs('admin.works')) active @endif @if(request()->routeIs('admin.domaine')) active @endif ">
                        <i class="nav-icon fa fa-graduation-cap"></i>
                        <p>
                            Travaux
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.works')}}"
                                class="nav-link @if(request()->routeIs('admin.works')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Travaux</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.domaine')}}"
                                class="nav-link @if(request()->routeIs('admin.domaine')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Domaine Epxertise</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.student')}}"
                        class="nav-link @if(request()->routeIs('admin.student')) active @endif">

                        <i class="nav-icon fa fa-users-slash"></i>
                        <p>
                            Etudiant
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.users')}}"
                        class="nav-link @if(request()->routeIs('admin.users')) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Utilisateur
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.administration')}}"
                        class="nav-link @if(request()->routeIs('admin.administration')) active @endif ">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Administration

                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>