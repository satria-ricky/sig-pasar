<?php
class M_delete extends CI_model {
    
    public function delete_pasar($v_id)
    {
	    $this->db->where('pasar_id', $v_id);
		$this->db->delete('tb_pasar');
    }


}