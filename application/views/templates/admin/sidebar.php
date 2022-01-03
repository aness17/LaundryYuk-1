<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('index.php/superadmin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Status Transaksi</h6>
                        <a class="collapse-item" href="<?= base_url('index.php/superadmin/mp') ?>">Menunggu Penjemputan</a>
                        <a class="collapse-item" href="<?= base_url('index.php/superadmin/pesanandiproses') ?>">Pesanan Diproses</a>
                        <a class="collapse-item" href="<?= base_url('index.php/superadmin/pesanandiantar') ?>">Pesanan Diantar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/superadmin/datapemesanan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pemesanan Customer</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/superadmin/datapemesananagen') ?>">
                    <i class="fas fa-people-carry"></i>
                    <span>Pemesanan Agen</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/superadmin/datalayanan') ?>">
                    <i class="fas fa-fw fa-tshirt"></i>
                    <span>Data Laundry</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/superadmin/datadmin') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Admin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/superadmin/datacs') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Customer</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/superadmin/datatransaksi') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Histori Transaksi</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/superadmin/laporan') ?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->