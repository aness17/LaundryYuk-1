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
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php $no = 1;
                        $id = $this->session->userdata('id');
                        $pemesanan = $this->db->query("SELECT * FROM transaksi INNER JOIN user on transaksi.id_cs=user.id_cs INNER JOIN jenisld on transaksi.id_jenis=jenisld.id_jenis 
                        INNER JOIN layananld on transaksi.id_layanan=layananld.id_layanan where status = 'selesai' and catatan = 'input by outlet $id' ORDER BY id_transaksi ASC");


                        foreach ($pemesanan->result_array() as $users) : ?>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $users['nama_cs'] ?></td>
                                <td><?= $users['alamat_cs'] ?></td>
                                <td><?= $users['nama_jenis'] ?></td>
                                <td><?= $users['nama_layanan'] ?></td>
                                <td><?= $users['tgl_order'] ?></td>
                                <td><?= $users['tgl_pickup'] ?></td>
                                <td><?= $users['ket_jumlah'] ?></td>
                                <td><?= $users['harga'] ?></td>
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