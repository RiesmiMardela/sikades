<?php
class Enkripsi_model extends CI_Model
{
    public function getAllEnkripsi()
    {
        $this->db->select('*');
        $this->db->join(
            'user_role',
            'tb_user.role_id=user_role.id_role',
            'inner'
        );
        return $this->db->get('tb_user')->result_array();
    }
}
