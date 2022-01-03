<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Data Pemesanan</h1>

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
                            <!-- <th>Aksi</th> -->

                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php $no = 1;

                        // $user = $this->db->query("SELECT * FROM transaksi");
                        foreach ($pemesanan as $users) :
                            $keterangan = "";
                            if ($users['status'] == 'Menunggu Penjemputan') {
                                $keterangan = "warning";
                            } elseif ($users['status'] == 'Pesanan Diproses') {
                                $keterangan = "secondary";
                            } elseif ($users['status'] == 'Pesanan Diantar') {
                                $keterangan = "primary";
                            } else {
                                $keterangan = "success";
                            }
                        ?>
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
                                <td class="alert alert-<?= $keterangan ?>"><?= $users['status'] ?></td>
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