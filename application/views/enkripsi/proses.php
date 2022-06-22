<div class="container-fluid">
    <div class="card card-info mt-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-black">Proses Perhitungan Enkripsi</h6>
            </div>
            <div class="card-body">

                <?php
                echo "<button onclick='history.back()' type='submit' class='btn btn-info'><i class='fas fa-fw fa-sync'></i>Back</button><br><br>";
                foreach ($proses as $data) {
                    echo $data;
                }

                ?>
            </div>

        </div>
    </div>
</div>