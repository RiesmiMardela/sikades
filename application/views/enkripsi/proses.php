<div class="container-fluid">
    <div class="card card-info mt-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-black">Proses Perhitungan Enkripsi</h6>
            </div>
            <div class="card-body">

                <?php


                $user = $this->db->get_where('tb_user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $key = $this->input->post('password');
                $bin_ciphertext = "";
                $ciphertext = "";
                if (isset($_FILES['file'])) {
                    if ($_FILES['file']['type'] == "application/pdf") {
                        $this->load->library('pdfgenerator');

                        $pdf = new PdftoText($_FILES['file']['tmp_name']);
                        $data = $pdf->Text;

                        // encrypt
                        $plaintext = trim($data);

                        $arr_plaintext = str_split($plaintext, 8);
                        $proses = 0;


                        echo "<button onclick='history.back()' type='submit' class='btn btn-info'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='14' fill='currentColor'><path d='M256 0C114.6 0 0 114.6 0 256c0 141.4 114.6 256 256 256s256-114.6 256-256C512 114.6 397.4 0 256 0zM310.6 345.4c12.5 12.5 12.5 32.75 0 45.25s-32.75 12.5-45.25 0l-112-112C147.1 272.4 144 264.2 144 256s3.125-16.38 9.375-22.62l112-112c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L221.3 256L310.6 345.4z'/></svg> Back</button><br><br>";

                        foreach ($arr_plaintext as $i) {
                            echo "<b>Proses ke " . ++$proses . "</b> <br>";
                            $encrypt = $this->encrypt($i, $key, true);
                            $bin_ciphertext .= $encrypt;
                            $ciphertext .= $this->read_bin($encrypt);
                        }
                    }
                } else {
                    redirect('Enkripsi');
                }

                ?>
            </div>

        </div>
    </div>
</div>