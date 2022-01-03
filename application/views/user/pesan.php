<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/admin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">

</head>
<div class="container">
    <div class="booking-content">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="../../assets/form-order/images/form-img.jpg" style="width:450px; heigth: 400px;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="justify-content-center ">
                                        <form method="POST" action="<?= base_url('index.php/auth/pesan') ?>" id="booking-form">
                                            </br>

                                            <h2 style="font-weight:bold; text-align: center;">Pesan Sekarang!</h2>

                                            </br>
                                            <div class="form-radio">
                                                <!-- <label class="label-radio"> Kiloan/Satuan</label> -->
                                                <div class="radio-item-list">
                                                    <span class="radio-item">
                                                        <input type="radio" class="btn-check" name="jenis" value="kiloan" id="kiloan" checked onclick="ubahjenis(event);" />
                                                        <label class="btn btn-success" for="kiloan">Kiloan</label>
                                                        <?= form_error('jenis', '<small class="form-text text-danger">', '</small>'); ?>
                                                    </span>
                                                    <span class="radio-item">
                                                        <input type="radio" class="btn-check" name="jenis" value="satuan" id="satuan" onclick="ubahjenis(event);" />
                                                        <label class="btn btn-primary" for="satuan">Satuan</label>
                                                        <?= form_error('jenis', '<small class="form-text text-danger">', '</small>'); ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="form1">
                                                <label> Mau pakai jasa apa?</label>
                                                <div class="select-list" style="width:35px;">
                                                    <select name="kiloan" id="kiloan">
                                                        <?php
                                                        foreach ($layanan as $item) :

                                                        ?>
                                                            <option value="<?= $item['id_layanan'] ?>"><?= $item['nama_layanan'] ?></option>

                                                        <?php
                                                        endforeach; ?>

                                                    </select>
                                                    <?= form_error('kiloan', '<small class="form-text text-danger">', '</small>'); ?>
                                                </div>

                                                <div>

                                                    <div style="margin-top: 32px;">
                                                        <div class="form-group">
                                                            <label>Tanggal Penjemputan</label>
                                                            <input type="date" class="form-control" name="tgl_kiloan">
                                                            <?= form_error('tgl_kiloan', '<small class="form-text text-danger">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <button type="submit" class="btn btn-warning btn-lg btn-block" onclick="return confirm('Apakah data sudah benar ?')">Order</button>
                                                    </div>
                                                    </br>

                                                </div>
                                            </div>
                                            <div style="display: none;" id="form2">
                                                <div>
                                                    <label> Mau ngelaundry apa?</label>
                                                </div>
                                                <div class="select-list">
                                                    <select name="satuan" id="satuan">
                                                        <?php
                                                        foreach ($jenis as $item) : if ($item["satuan_jenis"] == 'satuan') {

                                                        ?>
                                                                <option value="<?= $item['id_jenis'] ?>"><?= $item['nama_jenis'] ?></option>

                                                        <?php }
                                                        endforeach; ?>

                                                    </select>
                                                    <?= form_error('satuan', '<small class="form-text text-danger">', '</small>'); ?>
                                                </div>

                                                <div>
                                                    </br> <label> Jumlah</label>

                                                    <div> <input type="number" name="jumlah" id="jumlah" placeholder="1 atau 2" /> </div>
                                                    <?= form_error('jumlah', '<small class="form-text text-danger">', '</small>'); ?>

                                                    <div style="margin-top: 32px;">
                                                        <label>Tanggal Penjemputan</label>
                                                        <input type="date" class="form-control" name="tgl_satuan">
                                                        <?= form_error('tgl_satuan', '<small class="form-text text-danger">', '</small>'); ?>

                                                    </div>
                                                </div>
                                                <br>
                                                <div>
                                                    <button type="submit" class="btn btn-warning btn-lg btn-block" onclick="return confirm('Apakah data sudah benar ?')">Order</button>
                                                </div>
                                                </br>

                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




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




<!-- ======= Footer ======= -->



<div class="social-links text-center text-lg-right pt-3 pt-lg-0">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
</div>
</div>
<script src="<?= base_url('assets/admin/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/admin/vendor/js/sb-admin-2.min.js') ?>"></script>
<!-- End Footer -->