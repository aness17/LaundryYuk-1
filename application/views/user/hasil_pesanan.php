<div class="main">
    <div class="section-title" data-aos="fade-up">
        <h2>Riwayat Pemesanan</h2>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-10 col-md-8 col-sm-8">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>Id Transaksi</th>
                                <th>Tanggal Order</th>
                                <th>Tanggal Penjemputan</th>
                                <th>Laundry</th>
                                <th>Layanan</th>
                                <th>Jenis</th>
                                <th>Berat</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                            $no = 1;
                            // $user = $this->db->query("SELECT * FROM user where fk_role = '2'");
                            foreach ($user as $users) : ?>

                                <?php
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

                                <tr style="text-align: center;">
                                    <td><?= $no ?></td>
                                    <td><?= $users['id_transaksi'] ?></td>
                                    <td><?= $users['tgl_order'] ?></td>
                                    <td><?= $users['tgl_pickup'] ?> </td>
                                    <td> <?= $users['satuan_jenis'] ?></td>
                                    <td><?= $users['nama_jenis'] ?></td>
                                    <td> <?= $users['nama_layanan'] ?></td>
                                    <td> <?= $users['ket_jumlah'] ?></td>
                                    <td>Rp<?= number_format($users['harga'], 0, ",", ".");  ?></td>
                                    <td>
                                        <div class="alert alert-<?= $keterangan ?>" role="alert"><?= $users['status']  ?></div>
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
</div>