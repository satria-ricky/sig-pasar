<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    


    public function detail_pasar (){
        $id = $this->input->get('id');
        $data = $this->M_read->select_pasar_by_id($id);
        
        echo json_encode($data);
    }

    public function login(){

        $v_username = $this->input->post('username');
        $v_password = $this->input->post('password');

        $pengguna = $this->M_auth->auth($v_username, $v_password);

        if ($pengguna){

            if ($pengguna['user_id_status'] == 1) {

                $v_data['id_username'] = $pengguna['user_id'];
                $v_data['id_level'] = $pengguna['user_id_level'];

                $this->session->set_userdata($v_data);

                if ($pengguna['user_id_level'] == 1) {
                       
                    redirect('admin/profile');
                }else {
                    redirect('sales/profile');
                }

            }else{
                $this->session->set_flashdata('nonaktif', 'Maaf, akun Anda telah dinonaktifkan !');
                redirect('dashboard');    
            }
        }else {
            $this->session->set_flashdata('error', 'username dan password salah !');
            redirect('dashboard');
        }

    }


    public function logout(){
        $this->session->unset_userdata('id_username');
        $this->session->unset_userdata('id_level');
        $this->session->set_flashdata('logout', 'Berhasil logout !');
        redirect('dashboard');
    }

    public function blocked(){
        $this->load->view('v_blocked/index.php');
    }


}