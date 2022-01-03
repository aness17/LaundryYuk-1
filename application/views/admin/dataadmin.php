<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- Data Outlet     -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Data Outlet</h1>
            <a href="<?= base_url('index.php/superadmin/add') ?>" type="button" class="btn btn-success text-white btn-sm">
                Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>ID</th>
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
                        // $user = $this->db->query("SELECT * FROM user where fk_role = '2'");
                        foreach ($outlet as $outlets) : ?>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $outlets['id_cs'] ?></td>
                                <td><?= $outlets['nama_cs'] ?></td>
                                <td><?= $outlets['email_cs'] ?></td>
                                <!-- <td><?= $outlets['passwd_cs'] ?></td> -->
                                <td><?= $outlets['nohp_cs'] ?></td>
                                <td><?= $outlets['alamat_cs'] ?></td>
                                <td><?= $outlets['catatan'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('index.php/superadmin/edit/' . $outlets['id_cs']) ?>" type="button" class="fas fa-edit" style="color:limegreen">
                                    </a>
                                    <a href="<?= base_url('index.php/superadmin/delete/' . $outlets['id_cs']) ?>" type="button" class="fas fa-trash" style="color:red" onclick="return confirm('Are you sure to delete this row ?')">
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

    <!-- Data agens     -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Data Agen</h1>
            <a href="<?= base_url('index.php/superadmin/add') ?>" type="button" class="btn btn-success text-white btn-sm">
                Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>ID</th>
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
                        // $user = $this->db->query("SELECT * FROM user where fk_role = '4'");
                        foreach ($agen as $agens) :?>
                            <tr style="text-align: center;">
                                <td><?= $no; ?></td>
                                <td><?= $agens['id_cs'] ?></td>
                                <td><?= $agens['nama_cs'] ?></td>
                                <td><?= $agens['email_cs'] ?></td>
                                <!-- <td><?= $agens['passwd_cs'] ?></td> -->
                                <td><?= $agens['nohp_cs'] ?></td>
                                <td><?= $agens['alamat_cs'] ?></td>
                                <td><?= $agens['catatan'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('index.php/superadmin/edit/' . $agens['id_cs']) ?>" type="button" class="fas fa-edit" style="color:limegreen">
                                    </a>
                                    <a href="<?= base_url('index.php/superadmin/delete/' . $agens['id_cs']) ?>" type="button" class="fas fa-trash" style="color:red" onclick="return confirm('Are you sure to delete this row ?')">
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