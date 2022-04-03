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
}
