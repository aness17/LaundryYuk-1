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
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/agen') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/agen/datacs') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Seluruh Customer</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/agen/datacsagen') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Customer</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/agen/datapemesanan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pemesanan</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('index.php/agen/history') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Histori Transaksi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama') ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/admin/') ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('index.php/login/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h1 class="h3 mb-2 text-gray-800">History Pemesanan</h1>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Jenis Laundry</th>
                                            <th>Jenis Layanan</th>
                                            <th>Tgl Order</th>
                                            <th>Tgl Jemput</th>
                                            <th>Tgl Antar</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Status</th>


                                        </tr>
                                    </thead>
                                    <tbody class="list">

                                        <?php $no = 1;
                                        //                 $id = $this->session->userdata('id');
                                        //                 $pemesanan = $this->db->query("SELECT * FROM transaksi INNER JOIN user on transaksi.id_cs=user.id_cs INNER JOIN jenisld on transaksi.id_jenis=jenisld.id_jenis 
                                        // INNER JOIN layananld on transaksi.id_layanan=layananld.id_layanan where status = 'selesai' and catatan = 'input by agen $id' ORDER BY id_transaksi ASC");


                                        foreach ($pemesanan as $users) : ?>
                                            <tr style="text-align: center;">
                                                <td><?= $no; ?></td>
                                                <td><?= $users['nama_cs'] ?></td>
                                                <td><?= $users['alamat_cs'] ?></td>
                                                <td><?= $users['nama_jenis'] ?></td>
                                                <td><?= $users['nama_layanan'] ?></td>
                                                <td><?= $users['tgl_order'] ?></td>
                                                <td><?= $users['tgl_pickup'] ?></td>
                                                <td><?= $users['tgl_antar'] ?></td>
                                                <td><?= $users['ket_jumlah'] ?></td>
                                                <td>Rp<?= number_format($users['harga'], 0, ",", ".");  ?></td>
                                                <td><?= $users['status'] ?></td>

                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->