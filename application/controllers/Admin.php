<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_login();
    }



    



//PROFILE
    public function index (){
        $v_data['title'] = 'Profile';

        $v_id_username = $this->session->userdata('id_username'); 

        $v_data['data_pengguna'] = $this->M_read->get_by_id($v_id_username);

       
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('templates/sidebar_admin', $v_data);
            $this->load->view('templates/load_template_footer');
            $this->load->view('v_profile/profile',$v_data);
            $this->load->view('templates/footer');
    }


     public function edit_profile (){
        $v_data['title'] = 'Profile';

        $v_id_username = $this->session->userdata('id_username'); 

        $v_data['data_pengguna'] = $this->M_read->get_by_id($v_id_username);


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Silahkan masukkan Nama !',
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Silahkan masukkan Username !'
        ]); 
       

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Silahkan masukkan Password !',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Silahkan masukkan Alamat !',
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('templates/sidebar_admin', $v_data);
            $this->load->view('templates/load_template_footer');
            $this->load->view('v_profile/edit_profile',$v_data);
            $this->load->view('templates/footer');
        }else{

            $v_nama     = $this->input->post('nama');
            $username_input = $this->input->post('username');
            $v_password = $this->input->post('password');
            $v_alamat = $this->input->post('alamat');
            $upload_foto = $_FILES['foto']['name'];

            if($this->M_read->cek_username($username_input, $v_id_username)){
                $this->session->set_flashdata('error', 'Gagal mengubah! Username telah terdaftar!');
                redirect('admin/edit_profile');

            }
            else{

                if($upload_foto){
                
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '5000';
                    $config['upload_path'] = './assets/foto/user/';
                        
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto')){
                        $v_nama_foto = $this->upload->data('file_name');
    
                        $v_foto_lama = $v_data['data_pengguna']['admin_foto'];
                        
                        if($v_foto_lama != 'default.jpg'){
                            unlink(FCPATH . 'assets/foto/user/' . $v_foto_lama);
                        }
                        
                        $v_data = [
                            'admin_nama' => $v_nama,
                            'admin_username' => $username_input,
                            'admin_password' => $v_password,
                            'admin_alamat' => $v_alamat,
                            'admin_foto' => $v_nama_foto
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data = [
                        'admin_nama' => $v_nama,
                        'admin_username' => $username_input,
                        'admin_password' => $v_password,
                        'admin_alamat' => $v_alamat
                    ];
                }
                $this->M_update->edit_profile($v_id_username, $v_data);
                $this->session->set_flashdata('pesan', 'Profile berhasil diubah!');
                redirect('admin');

            }            
        }
    }



//DATA PASAR
    public function get_pasar() {

        $v_status = $this->input->post('id_status');
       if( strlen($v_status) != 0 ){
            $data = $this->M_user->select_by_status($v_status);  
        }else{  
            $data = $this->M_user->select_all_sales();
        }
            echo json_encode($data);

    }


    public function daftar_pasar (){
        $v_data['title'] = 'Daftar pasar';

        $v_id_username = $this->session->userdata('id_username'); 

        $v_data['data_pengguna'] = $this->M_read->get_by_id($v_id_username);

       
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('templates/sidebar_admin', $v_data);
            $this->load->view('templates/load_template_footer');
            $this->load->view('v_pasar/daftar_pasar',$v_data);
            $this->load->view('templates/footer');
    }





    public function tambah_data(){
        $v_data['title'] = 'Tambah Data';
        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_read->get_by_id($v_id_username);

        
        
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Silahkan masukkan Nama sales!',
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.user_username]', [
            'required' => 'Silahkan masukkan Username sales!',
            'is_unique' => 'Username telah terdaftar!'
        ]); 
       

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Silahkan masukkan Password sales!',
        ]);

        $this->form_validation->set_rules('kontak', 'Kontak', 'required|trim', [
            'required' => 'Silahkan masukkan Kontak sales!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Silahkan masukkan Alamat sales!',
        ]);

        $this->form_validation->set_rules('status','Status','required|callback_validasi_status');


        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('templates/sidebar_admin', $v_data);
            $this->load->view('templates/load_template_footer');
            $this->load->view('v_pasar/tambah_pasar', $v_data);
            $this->load->view('templates/footer');
        }
        else{
            $v_nama     = $this->input->post('nama');
            $v_username = $this->input->post('username');
            $v_password = $this->input->post('password');
            $v_kontak = $this->input->post('kontak');
            $v_alamat = $this->input->post('alamat');
            $v_status = $this->input->post('status');
            
            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/user/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');             
                    $v_data = [
                        'user_id_level' => 2,
                        'user_id_status' => $v_status,
                        'user_nama' => $v_nama,
                        'user_username' => $v_username,
                        'user_password' => $v_password,
                        'user_kontak' => $v_kontak,
                        'user_alamat' => $v_alamat,
                        'user_foto' => $v_nama_foto,
                        'user_created' => date('Y-m-d')
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                    'user_id_level' => 2,
                    'user_id_status' => $v_status,
                    'user_nama' => $v_nama,
                    'user_username' => $v_username,
                    'user_password' => $v_password,
                    'user_kontak' => $v_kontak,
                    'user_alamat' => $v_alamat,
                    'user_foto' => 'default.jpg',
                    'user_created' => date('Y-m-d')
                ];
            }

            $this->M_user->create_sales($v_data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('admin/daftar_sales');

        }
    }








}