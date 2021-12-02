<?php
class M_update extends CI_model {
    
	// EDIT PROFILE
	public function edit_profile($id, $data){     
	   $this->db->update('tb_admin', $data, array('admin_id' => $id));
	}

}