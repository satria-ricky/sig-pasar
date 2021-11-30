<?php
class M_create extends CI_model {
    
    public function tambah_pasar($v_data)
    {
        $this->db->insert('tb_pasar', $v_data);
        return $this->db->affected_rows();
    }


}