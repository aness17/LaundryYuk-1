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
                <form method="POST" action="<?= base_url('index.php/outlet/edit/' . $users['id_cs']) ?>">
                    <div class="card-body">
                        <?= form_open_multipart('index.php/outlet/edit/' . $users['id_cs']); ?>
                        <div class="form-group mb-3">
                            <label class="form-control-label" for="input-username">Nama</label>
                            <input type="text" id="input-username" class="form-control" name="nama" placeholder="Name" value="<?= $users['nama_cs'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Email</label>
                                    <input type="text" id="input-username" class="form-control" name="email" placeholder="Email" value="<?= $users['email_cs'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">No. Handphone</label>
                                    <input type="text" id="input-username" class="form-control" name="nohp" placeholder="ex. 08xxxxxxxxx" value="<?= $users['nohp_cs'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label">Alamat</label>
                                    <textarea rows="2" class="form-control" name="alamat" placeholder="ex. Jl. Kenangan" style="resize: none;"><?= $users['alamat_cs'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Password</label>
                                    <input type="name" id="input-username" class="form-control" name="passwd" placeholder="Password" value="<?= $users['passwd_cs'] ?>">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Description -->
                    <div class="pl-lg-4 mt-2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>