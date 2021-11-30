<?php
class M_bulu_tangkis extends CI_model {

    public function select_status(){
      return $this->db->get('tb_status')->result_array();
    }

    public function select_bulu_tangkis(){
        $sql='SELECT * FROM tb_bt LEFT JOIN tb_status ON tb_bt.bt_status = tb_status.stts_id';
        return $query=$this->db->query($sql)->result_array(); 
    }

    public function selectAllverifikasi(){
      $sql='SELECT * FROM tb_bt LEFT JOIN tb_status ON tb_bt.bt_status = tb_status.stts_id WHERE bt_status = 1';
      return $query=$this->db->query($sql)->result_array(); 
    }

    public function selectAllbyStatus($status){
      $sql='SELECT * FROM tb_bt LEFT JOIN tb_status ON tb_bt.bt_status = tb_status.stts_id WHERE bt_status=?';
      return $query=$this->db->query($sql,$status)->result_array(); 
    }

  

    public function select_by_id($id){
      $sql='SELECT * FROM tb_bt LEFT JOIN tb_status ON tb_bt.bt_status = tb_status.stts_id WHERE bt_id =?';
      return $query=$this->db->query($sql,$id)->row_array(); 
    }

    
    public function total_bt($id){
        $sql='SELECT * FROM tb_bt WHERE bt_status = ?';
        $query=$this->db->query($sql,$id);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
        
    }


    public function edit_bt($id, $data){     
      $this->db->update('tb_bt', $data, array('bt_id' => $id));
    }

    


    public function hapus_bt($v_id) {
      $this->db->where('bt_id', $v_id);
      $this->db->delete('tb_bt');
    }

    public function create_bt($v_data)
    {
        $this->db->insert('tb_bt', $v_data);
        return $this->db->affected_rows();
    }


}