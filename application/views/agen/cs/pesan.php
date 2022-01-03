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
            <li class="nav-item active">
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
                <!-- Page content -->
                <div class="container-fluid mt--6">
                    <div class="row">
                        <div class="col-xl-7 order-xl-1 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h3 class="mb-0">Tambah Transaksi</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('index.php/agen/add') ?>" method="POST">

                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Nama</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" id="name" name="nama" onchange="changeAlamat(this.value)">

                                                        <?php $id = $this->session->userdata('id');
                                                        $user = $this->db->query("SELECT * FROM user where fk_role='1' and catatan='input by agen $id'");
                                                        foreach ($user->result_array() as $users) : ?>
                                                            <option value="<?= $users['nama_cs'] ?>"><?= $users['nama_cs'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-username">Alamat</label>
                                                    <input type="text" id="alamat" disabled id="input-username" class="form-control" name="alamat" placeholder="Alamat">
                                                    <!-- <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="form-group">
                                                    <div class="form-radio">
                                                        <label class="label-radio"> Jenis laundry</label>
                                                        <div class="radio-item-list">
                                                            <span class="radio-item">
                                                                <input type="radio" name="jenislaundry" value="kiloan" id="kiloan" checked onclick="ubahjenis(event);" />
                                                                <label for="kiloan">Kiloan</label>
                                                            </span>
                                                            <span class="radio-item">
                                                                <input type="radio" name="jenislaundry" value="satuan" id="satuan" onclick="ubahjenis(event);" />
                                                                <label for="satuan">Satuan</label>
                                                            </span>
                                                            <!-- <?= form_error('jenislaundry', '<small class="form-text text-danger">', '</small>'); ?> -->
                                                        </div>
                                                    </div>
                                                    <div id="form1" class="row">
                                                        <div class="col-lg">
                                                            <div class="form-group">

                                                                <label> Jenis layanan</label>
                                                                <div class="select-list">
                                                                    <select class="form-control" name="jenislayanan" value="kiloan" id="kiloan">
                                                                        <?php $id = $this->session->userdata('id');
                                                                        $jenis = $this->db->query("SELECT * FROM layananld");
                                                                        foreach ($jenis->result_array() as $jns) : ?>
                                                                            <option value="<?= $jns['nama_layanan'] ?>"><?= $jns['nama_layanan'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <!-- <?= form_error('jenislayanan', '<small class="form-text text-danger">', '</small>'); ?> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="form2" class="row">
                                                        <div class="col-lg">
                                                            <div class="form-group">

                                                                <label> Jenis layanan</label>
                                                                <div class="select-list">
                                                                    <select class="form-control" name="jenislaundry2" value="satuan" id="satuan">
                                                                        <?php $id = $this->session->userdata('id');
                                                                        $jenis = $this->db->query("SELECT * FROM jenisld WHERE satuan_jenis='satuan'");
                                                                        foreach ($jenis->result_array() as $jns) : ?>
                                                                            <option value="<?= $jns['nama_jenis'] ?>"><?= $jns['nama_jenis'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <!-- <?= form_error('jenislaundry', '<small class="form-text text-danger">', '</small>'); ?> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg">
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="input-username">Tanggal Order</label>
                                                                <input type="date" id="input-username" class="form-control" name="tanggalorder" placeholder="Tanggal Order">
                                                                <?= form_error('tanggalorder', '<small class="form-text text-danger">', '</small>'); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg">
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="input-username">Tanggal Jemput</label>
                                                                <input type="date" id="input-username" class="form-control" name="tanggaljemput" placeholder="Tanggal Jemput">
                                                                <?= form_error('tanggaljemput', '<small class="form-text text-danger">', '</small>'); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg">
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="input-username">Jumlah</label>
                                                                <input type="text" id="input-username" class="form-control" name="jumlah" placeholder="Jumlah">
                                                                <?= form_error('jumlah', '<small class="form-text text-danger">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Description -->
                                                <div class="pl-lg-4 mt-2">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                                                </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        //Error
                        // $('#exampleFormControlSelect1').change(function() {
                        //     alert("test");
                        //     var nama = document.getElementByName('nama');
                        //     if (nama != '') {
                        //         $.ajax({
                        //             url: "<?php echo base_url(); ?>outlet/getAlamatByNama",
                        //             method: "POST",
                        //             data: {
                        //                 nama: nama
                        //             },
                        //             dataType: 'json',
                        //             success: function(data) {
                        //                 //document.getElementByName('alamat').value = ;
                        //                 idAlamat = document.getElementsByName('alamat');
                        //                 idAlamat.value = "test";
                        //             }
                        //         });
                        //     } else {
                        //         document.getElementByName('alamat').value = "gagal";
                        //     }
                        // });

                        function changeAlamat(value) {
                            var nama = value;
                            if (nama != '') {
                                $.ajax({
                                    url: "<?php echo base_url(); ?>/index.php/agen/getAlamatByNama",
                                    method: "POST",
                                    data: {
                                        nama: nama
                                    },
                                    dataType: 'json',
                                    success: function(data) {
                                        document.getElementById('alamat').value = data[0].alamat_cs;
                                    }
                                });
                            } else {
                                document.getElementByName('alamat').value = "gagal";
                            }
                        }
                    </script>
                    <script type="text/javascript">
                        const form1 = document.getElementById("form1")
                        const form2 = document.getElementById("form2")
                        const ubahjenis = (e) => {
                            form1.style.display = "none"
                            form2.style.display = "none"
                            console.log(e.target.value)
                            if (e.target.value == "kiloan") {
                                form1.style.display = "block"
                            } else if (e.target.value == "satuan") {
                                form2.style.display = "block"
                            }
                        }
                        const kiloan = document.getElementById("kiloan")
                        window.addEventListener("DOMContentLoaded", () => {
                            kiloan.click()
                        })

                        // $(function() {
                        //     $("#satuan,#kiloan").click(//function() {
                        //         console.log($(this).val())
                        //         $("#form2,#form1").hide()
                        //         if ($(this).val() == "kiloan") {
                        //             $("#form1").show();
                        //         } else {
                        //             $("#form2").show();
                        //         }

                        //     });
                        // });
                    </script>

</body>