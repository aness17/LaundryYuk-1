<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

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
                                    <form action="<?= base_url('index.php/outlet/addpemesananoutlet') ?>" method="POST">

                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Nama</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" id="name" name="nama" onchange="changeAlamat(this.value)">

                                                        <?php $id = $this->session->userdata('id');
                                                        $user = $this->db->query("SELECT * FROM user where fk_role='1' and catatan='input by outlet $id'");
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
                                    url: "<?php echo base_url(); ?>/index.php/outlet/getAlamatByNama",
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