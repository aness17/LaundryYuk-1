<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-7 order-xl-1 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit User </h3>
                        </div>
                    </div>
                </div>
                <?php

                ?>
                <form method="POST" action="<?= base_url('index.php/agen/editpesan/' . $users['id_transaksi']) ?>">
                    <div class="card-body">
                        <?= form_open_multipart('index.php/agen/edit/' . $users['id_transaksi']); ?>
                        <div class="form-group mb-3">
                            <label class="form-control-label" for="input-username">Nama</label>
                            <input type="text" id="input-username" class="form-control" name="nama" placeholder="Name" value="<?= $users['nama_cs'] ?>" disabled>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Alamat</label>
                                    <input type="text" id="input-username" class="form-control" name="alamat" placeholder="Alamat" value="<?= $users['alamat_cs'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Jenis Laundry</label>
                                    <input type="text" id="input-username" class="form-control" name="jenis" placeholder="Jenis" value="<?= $users['nama_jenis'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Jenis Layanan</label>
                                    <input type="text" id="input-username" class="form-control" name="layanan" placeholder="Layanan" value="<?= $users['nama_layanan'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Jumlah</label>
                                    <input type="name" id="input-username" class="form-control" name="jumlah" placeholder="Jumlah" value="<?= $users['ket_jumlah'] ?>">
                                    <?= form_error('jumlah', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="px-lg-4 mb-4 ">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>