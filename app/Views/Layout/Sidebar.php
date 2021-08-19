<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #660000;">
<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <!-- <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light" style="color:#fff">Sistem Klasifikasi Pendonor</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="/assets/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a style="color:#fff" href="#" class="d-block"><?php echo session()->get('nama'); ?></a>
    </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="/dashboard" class="nav-link" style="color:#fff">
                <i class="nav-icon fa fa-tachometer-alt"></i>
                <p>
                Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/data" class="nav-link" style="color:#fff">
                <i class="nav-icon fa fa-table"></i>
                <p>
                Data
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/cek" class="nav-link" style="color:#fff">
                <i class="nav-icon fas fa-search"></i>
                <p>
                Cek Potensi Pendonor
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/about" class="nav-link" style="color:#fff">
                <i class="nav-icon fas fa-info-circle"></i>
                <p>
                About
                </p>
            </a>
        </li>
        
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>