<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Data Pemesanan</h1>

            <a href="<?= base_url('index.php/outlet/addpemesananoutlet') ?>" type="button" class="btn btn-success text-white btn-sm">
                Tambah
            </a>

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
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php $no = 1;
                        // $user = $this->db->query("SELECT * FROM transaksi");
                        $id = $this->session->userdata('id');
                        $pemesanan = $this->db->query("SELECT * FROM transaksi INNER JOIN user on transaksi.id_cs=user.id_cs INNER JOIN jenisld on transaksi.id_jenis=jenisld.id_jenis 
        INNER JOIN layananld on transaksi.id_layanan=layananld.id_layanan where status <> 'selesai' and catatan = 'input by outlet $id'  ORDER BY id_transaksi ASC");

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
                                <td>Rp<?= number_format($users['harga'], 0, ",", ".");  ?></td>
                                <td><?= $users['status'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('index.php/outlet/editpesan/' . $users['id_transaksi']) ?>" type="button" class="fas fa-edit btn btn-warning">
                                    </a>
                                    <!-- <a href="<?= base_url('index.php/outlet/delete/' . $users['id_transaksi']) ?>" type="button" class="fas fa-trash-alt btn btn-danger" onclick="return confirm('Are you sure to delete this row ?')"></a> -->
                                    <?php if ($users['status'] == 'Menunggu Penjemputan') : ?>
                                        <a href="<?= base_url('index.php/outlet/updatepemesanan/' . $users['id_transaksi']) . '/1' ?>" type="button" class="btn btn-secondary" onclick="return confirm('Apakah Pesanan Sudah dijemput?')"><i class="fas fa-clipboard-list"></i></a>
                                    <?php elseif ($users['status'] == 'Pesanan Diproses') : ?>
                                        <a href="<?= base_url('index.php/outlet/updatepemesanan/' . $users['id_transaksi']) . '/2' ?>" type="button" class="btn btn-primary" onclick="return confirm('Apakah Pesanan Sudah selesai diproses?')"><i class="fas fa-truck"></i></a>
                                    <?php else : ?>
                                        <a href="<?= base_url('index.php/outlet/updatepemesanan/' . $users['id_transaksi']) . '/3' ?>" type="button" class="btn btn-success" onclick="return confirm('Apakah Pesanan sudah selesai?')"><i class="fas fa-check"></i></a>
                                    <?php endif; ?>
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