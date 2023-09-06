<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('storage/icon.png')}}" alt="Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-light">Manajemen Seragam</span>
    </a>

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU UTAMA</li>
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link {{(request()->is('home')) ? 'active' :''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p>
                        </a>
                    </li>
                </li>
                <li class="nav-item has-treeview {{(request()->is('seragam')) ? 'menu-open' :''}}">
                    <a href="#" class="nav-link {{(request()->is('seragam')) ? 'active' :''}}">
                      <i class="nav-icon fas fa-server"></i>
                      <p>
                        Data Master
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview bg-secondary">
                        <li class="nav-item">
                            <a href="{{route('seragam.index')}}" class="nav-link {{(request()->is('seragam')) ? 'active' :''}}">
                                <i class="fas fa-school nav-icon"></i><p>Seragam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-tie nav-icon"></i><p>Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-calendar-week nav-icon"></i><p>Tahun Pelajaran</p>
                            </a>
                        </li>
                    </ul>
                  </li>
            </ul>
        </nav>
    </div>

</aside>
