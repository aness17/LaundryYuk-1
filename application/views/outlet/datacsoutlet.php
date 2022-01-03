<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
            <a href="<?= base_url('index.php/outlet/add') ?>" type="button" class="btn btn-success text-white btn-sm">
                Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>No. Hp</th>
                            <th>Alamat</th>
                            <th>Catatan</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php $no = 1;

                        // $user = $this->db->query("SELECT * FROM user where fk_role = '1' and catatan = 'input by outlet ".$this->session->userdata('id')."'" );
                        foreach ($user as $users) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $users['nama_cs'] ?></td>
                                <td><?= $users['email_cs'] ?></td>
                                <td><?= $users['passwd_cs'] ?></td>
                                <td><?= $users['nohp_cs'] ?></td>
                                <td><?= $users['alamat_cs'] ?></td>
                                <td><?= $users['catatan'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('index.php/outlet/edit/' . $users['id_cs']) ?>" type="button" class="fas fa-edit" style="color:limegreen">
                                    </a>
                                    <a href="<?= base_url('index.php/outlet/delete/' . $users['id_cs']) ?>" type="button" class="fas fa-trash" style="color:red" onclick="return confirm('Are you sure to delete this row ?')">
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