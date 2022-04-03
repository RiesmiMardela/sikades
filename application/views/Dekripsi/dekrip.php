<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <?php var_dump($pengguna); ?> -->
    <!-- /.card-header -->

    <div class="card card-info mt-3">

        <!-- /.card-header -->

        <div class="card card-info mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-black">Data Dekripsi</h6>
                </div>
            </div>
            <div class=" card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama File Awal</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama File Enkripsi</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Masukkan Kunci</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>">
                        <small class="form-text text-danger"><?= form_error('password')  ?></small>
                    </div>
                </div>

                <!-- <div class="card-footer"> -->
                <button type="submit" class="btn btn-info"><i class="fas fa-unlock"></i> Dekripsi</button>
                <!-- </div> -->
                <!-- /.card-footer -->
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->