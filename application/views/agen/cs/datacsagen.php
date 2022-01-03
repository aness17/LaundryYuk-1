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
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('index.php/agen/datacsagen') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Customer</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('index.php/agen/datapemesanan') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pemesanan</span></a>
            </li>
            <li class="nav-item">
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
                            <h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
                            <a href="<?= base_url('index.php/agen/addcs') ?>" type="button" class="btn btn-success text-white btn-sm">
                                Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <!-- <th>Password</th> -->
                                            <th>No. Hp</th>
                                            <th>Alamat</th>
                                            <th>Catatan</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody class="list">

                                        <?php $no = 1;

                                        // $user = $this->db->query("SELECT * FROM user where fk_role = '1' and catatan = 'input by agen ".$this->session->userdata('id')."'" );
                                        foreach ($user as $users) : ?>
                                            <tr style="text-align: center;">
                                                <td><?= $no; ?></td>
                                                <td><?= $users['nama_cs'] ?></td>
                                                <td><?= $users['email_cs'] ?></td>
                                                <!-- <td><?= $users['passwd_cs'] ?></td> -->
                                                <td><?= $users['nohp_cs'] ?></td>
                                                <td><?= $users['alamat_cs'] ?></td>
                                                <td><?= $users['catatan'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('index.php/agen/edit/' . $users['id_cs']) ?>" type="button" class="fas fa-edit" style="color:limegreen">
                                                    </a>
                                                    <a href="<?= base_url('index.php/agen/delete/' . $users['id_cs']) ?>" type="button" class="fas fa-trash" style="color:red" onclick="return confirm('Are you sure to delete this row ?')">
                                                    </a>
                                                </td>
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
        </div>
    </div>
</body>