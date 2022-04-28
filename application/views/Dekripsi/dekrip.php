<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($pengguna); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">

        <!-- /.card-header -->

        <class="card card-info mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-black">Data Dekripsi</h6>
                </div>
            </div>
            <!-- <form class="form-horizontal" action="" method="POST"> -->
            <?= form_open_multipart('dekripsi/dekrip/' . $data['id_file']); ?>
            <input type="hidden" name="id_file" value="<?= $data['id_file'] ?>">
            <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
            <div class=" card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama File Awal</label>
                    <div class="col-10">
                        <input type="text" name="nama_file" id="nama_file" class="form-control" placeholder="Nama File Awal" value="<?= $data['nama_file']; ?>" readonly>
                        <small class="form-text text-danger"><?= form_error('nama_file')  ?></small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama File Enkripsi</label>
                    <div class="col-10">
                        <input type="text" name="nama_file_enkrip" id="nama_file_enkrip" class="form-control" placeholder="Nama File Enkripsi" value="<?= $data['nama_file_enkrip']; ?>" readonly>
                        <small class="form-text text-danger"><?= form_error('nama_file_enkrip')  ?></small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Masukkan Kunci</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control mb-3" placeholder="Password" value="">
                        <?php echo $this->session->flashdata('massage'); ?>
                        <!-- <small class="form-text text-danger"><?= form_error('password')  ?></small> -->
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>


            </div>
            <input type="hidden" name="tanggal" value="<?= $data['tanggal'] ?>">

            <!-- <div class="card-footer"> -->
            <button type="submit" class="btn btn-info ml-4 mb-4"><i class="fas fa-unlock"></i> Dekripsi</button>
            <!-- /.card-footer -->
            <!-- </form> -->
            </class>
    </div>
</div>
</div>
<!-- End of Main Content -->