<?php
class Dekripsi_model extends CI_Model
{
    public function getAllDekripsi()
    {
        return $this->db->get('tb_user')->result_array();
    }

    public function formDataDekripsi()
    {
        $data = [
            // "nik" => $this->input->post('nik', true),
            // "nama" => $this->input->post('nama', true),
        ];

        $this->db->insert('tb_pend', $data);
        redirect('dekripsi');
    }
}
