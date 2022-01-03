<!DOCTYPE html>
<html lang="en">



<body>



    <!-- ======= Header ======= -->


    <div class="main">
        <div class="section-title" data-aos="fade-up">
            <h2>Detail Pemesanan</h2>

        </div>

        <?php
        $no = 1;
        // $user = $this->db->query("SELECT * FROM user where fk_role = '2'");
        foreach ($user as $users) :
            $keterangan = "";
            if ($users['status'] == 'Menunggu Penjemputan') {
                $keterangan = "warning";
            } elseif ($users['status'] == 'Pesanan Diproses') {
                $keterangan = "primary";
            } elseif ($users['status'] == 'Pesanan Diantar') {
                $keterangan = "secondary";
            } else {
                $keterangan = "success";
            }
        ?>

            <div class="row justify-content-center">

                <div class="card border-dark mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td>Id Transaksi </td>
                                            <td>: <?= $users['id_transaksi'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Penjemputan </td>
                                            <td>: <?= $users['tgl_pickup'] ?></td>

                                        </tr>
                                        <tr>
                                            <td>Laundry</td>
                                            <td>: <?= $users['satuan_jenis'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Layanan</td>
                                            <td>: <?= $users['nama_jenis'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis</td>
                                            <td>: <?= $users['nama_layanan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Berat</td>
                                            <td>: <?= $users['ket_jumlah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>: Rp<?= number_format($users['harga'], 0, ",", ".");  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>
                                                <div class="alert alert-<?= $keterangan ?>" role="alert"><?= $users['status']  ?></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td></td>
                        </table>

                    </div>


                </div>

            </div>
    </div>
    <div class="row justify-content-center">

        <div>
            </br>
            <a href="<?= base_url('index.php/auth/hasil_pesanan') ?>" style="width: 290px; align:center" type="button" class="btn btn-warning btn-lg btn-block">
                OK
            </a>
        </div>
    </div>
    </br>
<?php $no++;
        endforeach; ?>

</div>
</div>
</div>



</main>


<!-- ======= Footer ======= -->