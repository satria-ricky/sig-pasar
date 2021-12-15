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
    
    public function load_data_pasar(){

        $v_status = $this->input->post('id_status');
       if( strlen($v_status) != 0 ){
            $data = $this->M_read->select_pasar_by_status($v_status);  
        }else{  
            $data = $this->M_read->select_semua_pasar();
        }
            echo json_encode($data);
    }


    public function load_status(){
        echo json_encode($this->M_read->select_status());
    }



    public function hapus_pasar (){

        $id = $this->input->post('id');

        $hapus_foto = $this->M_read->select_pasar_by_id($id);
        
        if($hapus_foto['pasar_foto'] != 'default.png'){
            unlink(FCPATH . 'assets/foto/pasar/' . $hapus_foto['pasar_foto']);
        }

        
        $data = $this->M_delete->delete_pasar($id);
        
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
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('jam_buka','Jam_buka','required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('jam_tutup','Jam_tutup','required|trim', [
            'required' => 'Silahkan set lokasi pasar!',
        ]);
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|trim', [
            'required' => 'Silahkan set titik koordinat!',
        ]);


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
            $v_alamat = $this->input->post('alamat');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');
            $v_jam_buka = $this->input->post('jam_buka');
            $v_jam_tutup = $this->input->post('jam_tutup');

            $upload_foto = $_FILES['foto']['name'];
            if ($this->input->post('deskripsi') == "" || $this->input->post('deskripsi') == NULL) {
                $v_deskripsi = "-";
            }else {
                $v_deskripsi = $this->input->post('deskripsi');
            }
            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/pasar/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');             
                    $v_data = [
                        'pasar_nama' => $v_nama,
                        'pasar_alamat' => $v_alamat,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'pasar_jam_buka' => $v_jam_buka,
                        'pasar_jam_tutup' => $v_jam_tutup,
                        'pasar_deskripsi' => $v_deskripsi,
                        'pasar_status' => '1',
                        'pasar_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                    'pasar_nama' => $v_nama,
                        'pasar_alamat' => $v_alamat,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'pasar_jam_buka' => $v_jam_buka,
                        'pasar_jam_tutup' => $v_jam_tutup,
                        'pasar_deskripsi' => $v_deskripsi,
                        'pasar_status' => '1',
                        'pasar_foto' => 'default.png'
                ];
            }

            $this->M_create->tambah_pasar($v_data);
            $this->session->set_flashdata('pesan', 'Data pasar berhasil ditambah! :)');
            redirect('admin/tambah_data');

        }
    }



    public function edit_pasar($v_id) {

        $v_data['title'] = 'Edit pasar';
        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_read->get_by_id($v_id_username);
        $v_data['pasar'] = $this->M_read->select_pasar_by_id($v_id);  
        

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('jam_buka','Jam_buka','required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('jam_tutup','Jam_tutup','required|trim', [
            'required' => 'Silahkan set lokasi pasar!',
        ]);
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|trim', [
            'required' => 'Silahkan set titik koordinat!',
        ]);


        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('templates/sidebar_admin', $v_data);
            $this->load->view('templates/load_template_footer');
            $this->load->view('v_pasar/edit_pasar', $v_data);
            $this->load->view('templates/footer');
        }
        else{
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');
            $v_jam_buka = $this->input->post('jam_buka');
            $v_jam_tutup = $this->input->post('jam_tutup');

            $upload_foto = $_FILES['foto']['name'];
            if ($this->input->post('deskripsi') == "" || $this->input->post('deskripsi') == NULL) {
                $v_deskripsi = "-";
            }else {
                $v_deskripsi = $this->input->post('deskripsi');
            }
            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/pasar/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');             
                    $v_data = [
                        'pasar_nama' => $v_nama,
                        'pasar_alamat' => $v_alamat,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'pasar_jam_buka' => $v_jam_buka,
                        'pasar_jam_tutup' => $v_jam_tutup,
                        'pasar_deskripsi' => $v_deskripsi,
                        'pasar_status' => '1',
                        'pasar_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                    'pasar_nama' => $v_nama,
                        'pasar_alamat' => $v_alamat,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'pasar_jam_buka' => $v_jam_buka,
                        'pasar_jam_tutup' => $v_jam_tutup,
                        'pasar_deskripsi' => $v_deskripsi,
                        'pasar_status' => '1',
                        'pasar_foto' => 'default.png'
                ];
            }

            $this->M_create->tambah_pasar($v_data);
            $this->session->set_flashdata('pesan', 'Data pasar berhasil ditambah! :)');
            redirect('admin/daftar_pasar');

        }

    }








}