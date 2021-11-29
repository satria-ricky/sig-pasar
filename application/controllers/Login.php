<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){

        if ($this->session->userdata('id_username')) {
            redirect('c_profile');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Form tidak boleh kosong!'
        ]); 
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Form tidak boleh kosong!'
        ]);

        $v_data['tittle'] = 'Login page!';


        if($this->form_validation->run() == false){
            $this->load->view('templates/header_login', $v_data);
            $this->load->view('v_login/index', $v_data);
            $this->load->view('templates/footer_login');
        }else{

            $v_username = $this->input->post('username');
            $v_password = $this->input->post('password');
            $v_admin = $this->M_admin->auth($v_username, $v_password);

            if ($v_admin){
                $v_id_admin = $this->M_admin->selectIdAdmin($v_username);
                $v_data['id_username'] = $v_admin['admin_id'];

                $this->session->set_userdata($v_data);
                redirect('c_bulu_tangkis/beranda');

            }else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username dan password salah!</div>');
                redirect('c_login');
            }

        }  
    }


    public function logout(){
        $this->session->unset_userdata('id_username');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil logout!</div>');
        redirect('login');
    }

    public function blocked(){
        $this->load->view('v_blocked/index.php');
    }

}