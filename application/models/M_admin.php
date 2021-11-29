<?php
class M_admin extends CI_model {


    public function auth($v_username, $v_password){
        $sql='SELECT * FROM tb_admin where admin_username=? AND admin_password=?';
        return $this->db->query($sql, array($v_username,$v_password))->row_array();
    }
    


    public function get_pengguna($v_id){
        return $this->db->get_where('tb_admin',  ['admin_id' => $v_id])->row_array();
    }
    

    public function selectIdAdmin($v_username){
        return $this->db->get_where('tb_admin',  ['admin_username' => $v_username])->row_array();
    }


}