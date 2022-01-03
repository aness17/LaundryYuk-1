<div class="main">
    <div class="container">
        <div class="signup-content">
            <div class="signup-img d-flex justify-content-center align-items-center flex-column">
                <?php
                $user = $this->session->userdata('id');
                $users = $this->User_model->getUserById($user);
                ?>
                <img src=<?php echo base_url('assets/assets2/images/user.png') ?> alt="">
                <h2><?php echo $users['nama_cs'] ?> </h2>
            </div>


            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                <div class="col-xl-9 col-lg-12 mt-4">
                    <form method="POST" class="register-form " id="register-form" action="<?= base_url('index.php/auth/editprofil/' . $users['id_cs']) ?>">
                        <?php
                        $message = $this->session->flashdata('message');
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" disabled required="true" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="<?= $users['nama_cs'] ?>" <?= form_error('isi terlebih dahulu', '<small class="form-text text-danger">', '</small>'); ?> />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="subject" placeholder="Alamat" id="subject" disabled data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" <?= form_error('isi terlebih dahulu', '<small class="form-text text-danger">', '</small>'); ?>> <?= $users['alamat_cs'] ?></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" disabled placeholder="No HP" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="<?= $users['nohp_cs'] ?>" <?= form_error('isi terlebih dahulu', '<small class="form-text text-danger">', '</small>'); ?> />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" disabled placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="<?= $users['email_cs'] ?>" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" disabled placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="<?= $users['passwd_cs'] ?>" />
                            <div class="validate"></div>
                        </div><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>