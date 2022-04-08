<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enkripsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Enkripsi_model');
    }

    public function index()

    {
        $data['title'] = 'Enkripsi';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['enkripsi'] = $this->Enkripsi_model->getAllEnkripsi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('enkripsi/index', $data);
        $this->load->view('templates/footer');
    }

    public function import()
    {
        $key = "12345678";
        $bin_ciphertext = "";
        $ciphertext = "";

        if (isset($_FILES['file'])) {
            if ($_FILES['file']['type'] == "application/pdf") {
                $a = new PDF2Text();
                $desModule = new desModule();

                $a->setFilename($_FILES['file']['tmp_name']);
                $a->decodePDF();

                // encrypt
                $plaintext = trim($a->output());
                $arr_plaintext = str_split($plaintext, 8);
                foreach ($arr_plaintext as $i) {
                    $encrypt = $desModule->encrypt($i, $key);
                    $bin_ciphertext .= $encrypt;
                    $ciphertext .= $desModule->read_bin($encrypt);
                }

                // write file txt
                $nama_file = 'bin.ciphertext.txt';
                force_download($nama_file, $bin_ciphertext);

                echo $plaintext;
                echo $bin_ciphertext;
                echo "<br>";
                echo $ciphertext;
            }
        } else {
            redirect('Enkripsi');
        }
    }
}
