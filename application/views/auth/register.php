<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">BUAT AKUN BARU !</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('auth/register') ?>">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-3">
                                            <span>Nama Lengkap</span>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap" value="<?= set_value('nama'); ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-3">
                                            <span>Email</span>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-3">
                                            <span>Password</span>
                                        </div>
                                        <div class="col-9">
                                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-3">
                                        <span>Re-Password</span>
                                    </div>
                                    <div class="col-9">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-success col-3">
                                    Daftar
                                </button>
                            </center>
                        </form>
                        <hr>
                        <div class="text-center">
                            <span>Sudah Punya Akun?</span><a class="small" href="<?= base_url('auth/index') ?>"> Masuk!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>