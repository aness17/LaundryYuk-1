<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-7 order-xl-1 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit Jenis Layanan </h3>
                        </div>
                    </div>
                </div>
                <form method="POST" action="<?= base_url('index.php/superadmin/editjenis/' . $jenis['id_jenis']) ?>">
                    <div class="card-body">
                        <?= form_open_multipart('index.php/superadmin/editjenis/' . $jenis['id_jenis']); ?>
                        <div class="form-group mb-3">
                            <label class="form-control-label" for="input-username">Nama</label>
                            <input type="text" id="input-username" class="form-control" name="nama" placeholder="Name" value="<?= $jenis['nama_jenis'] ?>">
                            <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Satuan Jenis Layanan</label>
                                    <input type="text" id="input-username" class="form-control" name="satuan" placeholder="Satuan" value="<?= $jenis['satuan_jenis'] ?>">
                                    <?= form_error('satuan', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Estimasi Waktu</label>
                                    <input type="name" id="input-username" class="form-control" name="estimasi" placeholder="Estimasi Waktu" value="<?= $jenis['estimasi_waktu_jenis'] ?>">
                                    <?= form_error('estimasi', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-label" for="input-username">Keterangan</label>
                            <input type="text" id="input-username" class="form-control" name="keterangan" placeholder="Keterangan" value="<?= $jenis['keterangan'] ?>">
                            <?= form_error('keterangan', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Harga</label>
                                    <input type="text" id="input-username" class="form-control" name="harga" placeholder="ex. 08xxxxxxxxx" value="<?= $jenis['harga_jenis'] ?>">
                                    <?= form_error('harga', '<small class="form-text text-danger">', '</small>'); ?>
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