<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminFront/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.addteacher') }}" class="nav-link {{ (request()->is('admin/addteacher*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Müəllim əlavə et
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.addstudent') }}" class="nav-link {{ (request()->is('admin/addstudent*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Tələbə əlavə et
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.siteediting') }}" class="nav-link {{ (request()->is('admin/siteediting*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Sayt məlumatları
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.addtelim') }}" class="nav-link {{ (request()->is('admin/addtelim*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Təlim əlavə et
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.sendnotification') }}" class="nav-link {{ (request()->is('admin/sendnotification*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Yeni bildiriş göndər
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.profil') }}" class="nav-link {{ (request()->is('admin/profil*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                        Profil tənzimləmələri
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.allteacher') }}" class="nav-link {{ (request()->is('admin/allteacher*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                        Bütün müəllimlər
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.allstudent') }}" class="nav-link {{ (request()->is('admin/allstudent*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                        Bütün tələbələr
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.alltelim') }}" class="nav-link {{ (request()->is('admin/alltelim*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                        Bütün Telimler
                      </p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="{{ route('admin.istifadeciTesdiqi') }}" class="nav-link {{ (request()->is('admin/accept-user*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                        Istifadeci tesdiqi
                      </p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="{{ route('admin.imtahanneticeleri') }}" class="nav-link {{ (request()->is('admin/examp-resualt*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                        Imtahan neticeleri
                      </p>
                    </a>
                  </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
