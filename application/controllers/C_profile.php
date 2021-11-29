<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_profile extends CI_Controller {
    public function __construct(){
        parent::__construct();
        cek_login();
    }



    public function index(){
        $v_data['judul'] = 'PROFILE';
        $v_id_username = $this->session->userdata('id_username'); 

        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => 'Form tidak boleh kosong!',
            'min_length' => 'Password terlalu pendek!'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        if($this->form_validation->run() == false){
            $v_data['tittle'] = 'Profile';
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_profile/index',$v_data);
            $this->load->view('templates/footer');
        }else{
            $username_input = $this->input->post('username');
            $v_nama = $this->input->post('nama');
            $v_password = $this->input->post('password');
            $v_alamat = $this->input->post('alamat');
            $upload_foto = $_FILES['foto']['name'];
                if($upload_foto){
                
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '5000';
                    $config['upload_path'] = './assets/foto/admin/';
                        
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto')){
                        $v_nama_foto = $this->upload->data('file_name');
    
                        $v_foto_lama = $v_data['data_pengguna']['admin_foto'];
                        
                        if($v_foto_lama != 'foto.png'){
                            unlink(FCPATH . 'assets/foto/admin/' . $v_foto_lama);
                        }
                        
                        $v_data = [
                            'admin_password' => $v_password,
                            'admin_nama' => $v_nama,
                            'admin_alamat' => $v_alamat,
                            'admin_foto' => $v_nama_foto,
                            'admin_username' => $username_input
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data = [
                        'admin_password' => $v_password,
                        'admin_nama' => $v_nama,
                        'admin_alamat' => $v_alamat,
                        'admin_username' => $username_input
                    ];
                }
                $this->M_profile->edit_profile($v_id_username, $v_data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profile berhasil diubah!</div>');
                redirect('c_profile');            
        }
    }


  
}