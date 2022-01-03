<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-7 order-xl-1 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Tambah Pengguna</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('index.php/superadmin/add') ?>" method="POST">
                        <div class="pl-lg-4">
                            <div class="form-group mb-3">
                                <label class="form-control-label" for="input-username">Nama</label>
                                <input type="text" id="input-username" class="form-control" name="nama" placeholder="Name">
                                <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Email</label>
                                        <input type="text" id="input-username" class="form-control" name="email" placeholder="Email">
                                        <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">No. Handphone</label>
                                        <input type="text" id="input-username" class="form-control" name="nohp" placeholder="ex. 08xxxxxxxxx">
                                        <?= form_error('nohp', '<small class="form-text text-danger">', '</small>'); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label class="form-control-label">Alamat</label>
                                        <textarea rows="2" class="form-control" name="alamat" placeholder="ex. Jl. Kenangan" style="resize: none;"></textarea>
                                        <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Password</label>
                                        <input type="password" id="input-username" class="form-control" name="passwd" placeholder="Password">
                                        <?= form_error('passwd', '<small class="form-text text-danger">', '</small>'); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Role</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="id_role">

                                            <?php
                                            $role = $this->db->query("SELECT * FROM roles");
                                            foreach ($role->result_array() as $roles) : ?>
                                                <option value="<?= $roles['id_role'] ?>"><?= $roles['nama_role'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('id_role', '<small class="form-text text-danger">', '</small>'); ?>
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