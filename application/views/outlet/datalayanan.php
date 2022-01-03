<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- Data JenisLayanan     -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Jenis Layanan</h1>
            <a href="<?= base_url('index.php/outlet/addlayanan') ?>" type="button" class="btn btn-success text-white btn-sm">
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
                            <th>Estimasi Waktu</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php $no = 1;
                        // $layanan = $this->db->query("SELECT * FROM layananld");  
                        foreach ($layanan as $layanans) : ?>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $layanans['nama_layanan'] ?></td>
                                <td><?= $layanans['estimasi_waktu_layanan'] ?> Hari</td>
                                <td><?= $layanans['harga_layanan'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('index.php/outlet/editlayanan/' . $layanans['id_layanan']) ?>" type="button" class="fas fa-edit" style="color:limegreen">
                                    </a>
                                    <a href="<?= base_url('index.php/outlet/deletelayanan/' . $layanans['id_layanan']) ?>" type="button" class="fas fa-trash" style="color:red" onclick="return confirm('Are you sure to delete this row ?')">
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

    <!-- Data Jenis Laundry     -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Jenis Laundry</h1>
            <a href="<?= base_url('index.php/outlet/addjenis') ?>" type="button" class="btn btn-success text-white btn-sm">
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
                            <th>Satuan</th>
                            <th>Estimasi Waktu</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php $no = 1;
                        // $jenis = $this->db->query("SELECT * FROM jenisld");
                        foreach ($jenis as $jeniss) : ?>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $jeniss['nama_jenis'] ?></td>
                                <td><?= $jeniss['satuan_jenis'] ?></td>
                                <td><?= $jeniss['estimasi_waktu_jenis'] ?> Hari</td>
                                <td><?= $jeniss['keterangan'] ?></td>
                                <td><?= $jeniss['harga_jenis'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('index.php/outlet/editjenis/' . $jeniss['id_jenis']) ?>" type="button" class="fas fa-edit" style="color:limegreen">
                                    </a>
                                    <a href="<?= base_url('index.php/outlet/deletejenis/' . $jeniss['id_jenis']) ?>" type="button" class="fas fa-trash" style="color:red" onclick="return confirm('Are you sure to delete this row ?')">
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