<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- Data Outlet     -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Data Testimoni</h1>
            <a href="<?= base_url('index.php/superadmin/addtesti') ?>" type="button" class="btn btn-success text-white btn-sm">
                Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="justify-content-center">
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Testimoni</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php $no = 1;
                        $user = $this->db->query("SELECT A.id_testi,B.nama_cs,B.email_cs,A.testimoni,B.id_cs FROM testimoni A, user B where A.id_cs = B.id_cs");
                        foreach ($user->result_array() as $users) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $users['id_testi'] ?></td>
                                <td><?= $users['nama_cs'] ?></td>
                                <td><?= $users['email_cs'] ?></td>
                                <td><?= $users['testimoni'] ?></td>
                                <td><?= $users['id_cs'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('index.php/superadmin/edit/' . $users['id_cs']) ?>" type="button" class="fas fa-edit" style="color:limegreen">
                                    </a>
                                    <a href="<?= base_url('index.php/superadmin/delete/' . $users['id_cs']) ?>" type="button" class="fas fa-trash" style="color:red" onclick="return confirm('Are you sure to delete this row ?')">
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