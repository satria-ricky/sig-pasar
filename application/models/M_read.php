<?php
class M_read extends CI_model {
    
    //PASAR
    public function select_pasar(){
        $sql='SELECT * FROM tb_pasar LEFT JOIN tb_status ON tb_pasar.pasar_status = tb_status.stts_id WHERE pasar_status = 1'; 
        return $query=$this->db->query($sql)->result_array(); 
    }

    public function select_semua_pasar(){
        $sql='SELECT * FROM tb_pasar LEFT JOIN tb_status ON tb_pasar.pasar_status = tb_status.stts_id'; 
        return $query=$this->db->query($sql)->result_array(); 
    }


    public function select_pasar_by_status($status){
        $sql='SELECT * FROM tb_pasar LEFT JOIN tb_status ON tb_pasar.pasar_status = tb_status.stts_id WHERE pasar_status =?';
        return $query=$this->db->query($sql,$status)->row_array(); 
    }


    public function select_pasar_by_id($id){
        $sql='SELECT * FROM tb_pasar LEFT JOIN tb_status ON tb_pasar.pasar_status = tb_status.stts_id WHERE pasar_id =?';
        return $query=$this->db->query($sql,$id)->row_array(); 
    }

    
    //ADMIN
    public function auth($v_username, $v_password){
        $sql='SELECT * FROM tb_admin where admin_username=? AND admin_password=?';
        return $this->db->query($sql, array($v_username,$v_password))->row_array();
    }
    


    public function get_by_id($v_id){
        return $this->db->get_where('tb_admin',  ['admin_id' => $v_id])->row_array();
    }
    

    public function select_admin_by_username($v_username){
        return $this->db->get_where('tb_admin',  ['admin_username' => $v_username])->row_array();
    }


    public function cek_username($username, $id){
        $sql='SELECT * FROM tb_admin where admin_username = ? AND admin_id != ?';
         return $this->db->query($sql, array($username,$id))->row_array();
    }


}