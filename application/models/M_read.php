<?php
class M_read extends CI_model {
    
    public function select_pasar(){
        $sql='SELECT * FROM tb_pasar LEFT JOIN tb_status ON tb_pasar.pasar_status = tb_status.stts_id WHERE pasar_status = 1'; 
        return $query=$this->db->query($sql)->result_array(); 
    }

    public function select_pasar_by_id($id){
        $sql='SELECT * FROM tb_pasar LEFT JOIN tb_status ON tb_pasar.pasar_status = tb_status.stts_id WHERE pasar_id =?';
        return $query=$this->db->query($sql,$id)->row_array(); 
    }


}