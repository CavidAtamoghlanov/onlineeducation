<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminFront/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Teacher</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->picture }}" class="img-circle a elevation-2 admin_picture"
                    alt="User Image">
            </div>
            <div class="info">
                <span style="color: white" class="admin_name d-block">{{ Auth::user()->name  }}</span>
                <span style="color: white" class="admin_surname d-block">{{ Auth::user()->surname  }}</span>
            </div>


        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('teacher.addTelim') }}" class="nav-link {{ (request()->is('teacher/add-telim*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                        Təlim əlavə etmək
                        </p>
                    </a>
                </li>
                    <li class="nav-item">
                        <a href="{{ route('teacher.checkResault') }}" class="nav-link ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                            Testlərin yoxlanılması
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('teacher.profil') }}" class="nav-link {{ (request()->is('teacher/profil*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                          Profil tənzimləmələri
                        </p>
                      </a>
                    </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
