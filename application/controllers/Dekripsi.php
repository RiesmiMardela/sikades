<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dekripsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dekripsi_model');
    }

    public function index()

    {
        $data['title'] = 'Dekripsi';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['dekripsi'] = $this->Dekripsi_model->getAllDekripsi();
        $data['file'] = $this->Dekripsi_model->getAllFile();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dekripsi/index', $data);
        $this->load->view('templates/footer');
    }

    public function download($id_file)
    {
        $this->load->helper('download');
        $file = $this->Dekripsi_model->getWhereFile($id_file);

        $name_file = $file['nama_file_enkrip'];
        $data = file_get_contents('./assets/file_encript/' . $name_file);

        print_r($file);

        force_download($name_file, $data);
        redirect('dekripsi');
    }

    public function dekrip()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Form Dekripsi';

        // $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dekripsi/dekrip');
            $this->load->view('templates/footer');
        } else {
            $this->Dekripsi_model->formDataDekripsi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil</div>');
            redirect('dekripsi');
        }

        // public function hapus($nik)
        // {
        //     $data['user'] = $this->db->get_where('tb_user', ['email' =>
        //     $this->session->userdata('email')])->row_array();

        //     $this->Penduduk_model->hapusDataPenduduk($nik);
        //     $this->session->set_flashdata('flash', 'Dihapus');
        //     redirect('penduduk');
        // }
    }
}
