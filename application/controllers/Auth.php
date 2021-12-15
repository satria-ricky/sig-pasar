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

    public function index(){

        // if ($this->session->userdata('id_username')) {
        //     redirect('c_profile');
        // }
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Form tidak boleh kosong!'
        ]); 
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Form tidak boleh kosong!'
        ]);

        $v_data['title'] = 'Sign in';



        if($this->form_validation->run() == false){
            $this->load->view('v_login/index', $v_data);

        }else{

            $v_username = $this->input->post('username');
            $v_password = $this->input->post('password');
            $v_admin = $this->M_read->auth($v_username, $v_password);

            if ($v_admin){
                $v_id_admin = $this->M_read->select_admin_by_username($v_username);
                $v_data['id_username'] = $v_admin['admin_id'];
                $this->session->set_userdata($v_data);
                redirect('admin');

            }else {
                $this->session->set_flashdata('error', 'Username dan password salah!');
                redirect('auth');
            }

        }  
    }


    public function logout(){
        $this->session->unset_userdata('id_username');
        $this->session->set_flashdata('logout', 'Berhasil logout !');
        redirect('auth');
    }

    public function blocked(){
        $this->load->view('v_blocked/index.php');
    }


}