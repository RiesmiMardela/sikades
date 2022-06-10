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
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('enkripsi');
        } else {
            $user = $this->db->get_where('tb_user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $key = $this->input->post('password');
            $bin_ciphertext = "";
            $ciphertext = "";

            if (isset($_FILES['file'])) {
                if ($_FILES['file']['type'] == "application/pdf") {
                    $this->load->library('pdfgenerator');


                    $desModule = new desModule();
                    $pdf = new PdftoText($_FILES['file']['tmp_name']);
                    $data = $pdf->Text;

                    // encrypt
                    $plaintext = trim($data);

                    $arr_plaintext = str_split($plaintext, 8);
                    foreach ($arr_plaintext as $i) {
                        $encrypt = $desModule->encrypt($i, $key);
                        $bin_ciphertext .= $encrypt;
                        $ciphertext .= $desModule->read_bin($encrypt);
                    }

                    // echo $bin_ciphertext;

                    // print_r($arr_plaintext);

                    // write file txt
                    $nama_file = $_FILES['file']['name'] . '.txt';
                    // force_download($nama_file, $bin_ciphertext);

                    // Inisialisasi
                    $random_number = rand(1000, 100000);
                    $filename_pdf = $random_number . '-' . $_FILES['file']['name'];
                    $filename_enc = $random_number . '-' . $nama_file;
                    $format = "%Y-%m-%d";

                    $config['upload_path']          = './assets/file_decript/';
                    $config['file_name']            = $filename_pdf;
                    $config['allowed_types']        = 'pdf';
                    $config['max_size']             = 2048;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;

                    $this->load->library('upload', $config);
                    $this->load->helper('file');
                    $this->load->helper('date');


                    // Pindah file pdf ke folder file decript
                    if ($this->upload->do_upload('file')) {
                        if (write_file(FCPATH . './assets/file_chipertext/' . $filename_enc, $ciphertext)) {
                            echo "Berhasil write chipertext file";

                            if (write_file(FCPATH . './assets/file_encript/' . $filename_enc, $bin_ciphertext)) {
                                echo "BErhasil write file";

                                $data = array(
                                    'id_user' => $user['id_user'],
                                    'nama_file' => $filename_pdf,
                                    'nama_file_enkrip' => $filename_enc,
                                    'password' => $this->input->post('password'),
                                    'tanggal' => mdate($format)
                                );

                                $this->Enkripsi_model->tambahDataEnkripsi($data);

                                redirect('dekripsi');
                            } else {
                                echo "Gagal write file";
                            }
                        } else {
                            echo "gagal write file chipertext";
                        }

                        echo "Berhasil pindah";
                    } else {
                        echo "Gagal pindah";
                        $error = array('error' => $this->upload->display_errors());

                        echo $error['error'];
                    }


                    // Write file txt ke folder encript

                    // echo $plaintext;
                    // echo $bin_ciphertext;
                    // echo "<br>";
                    // echo $ciphertext;
                }
            } else {
                redirect('Enkripsi');
            }
        }
    }

    public function process()
    {
        $data['title'] = 'Enkripsi';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['enkripsi'] = $this->Enkripsi_model->getAllEnkripsi();

        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('enkripsi/proses', $data);
        $this->load->view('templates/footer');

        if ($this->form_validation->run() == FALSE) {
            redirect('enkripsi');
        } else {
            $user = $this->db->get_where('tb_user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $key = $this->input->post('password');
            $bin_ciphertext = "";
            $ciphertext = "";

            // if (isset($_FILES['file'])) {
            //     if ($_FILES['file']['type'] == "application/pdf") {
            //         $this->load->library('pdfgenerator');


            //         $desModule = new desModule();
            //         $pdf = new PdftoText($_FILES['file']['tmp_name']);
            //         $data = $pdf->Text;

            //         // encrypt
            //         $plaintext = trim($data);

            //         $arr_plaintext = str_split($plaintext, 8);
            //         $proses = 0;


            //         echo "<button onclick='history.back()' type='submit' class='btn btn-info'><i class='fas fa-fw fa-sync'></i>Back</button><br><br>";

            //         foreach ($arr_plaintext as $i) {
            //             echo "Proses ke " . ++$proses . " <br>";
            //             $encrypt = $desModule->encrypt($i, $key, true);
            //             $bin_ciphertext .= $encrypt;
            //             $ciphertext .= $desModule->read_bin($encrypt);
            //         }
            //     }
            // } else {
            //     redirect('Enkripsi');
            // }
        }
    }
}
