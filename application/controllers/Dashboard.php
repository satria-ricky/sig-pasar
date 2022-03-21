<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $v_data['template'] = '
        <link href="'.base_url().'assets/dashboard5/navbar-top-fixed.css" rel="stylesheet">
        <link href="'.base_url().'assets/dashboard5/carousel.css" rel="stylesheet">';
        $v_data['is_aktif'] = 'home';
        $v_data['title'] = '<title>SIG | Pasar Tradisional </title>';
        $this->load->view('templates/header_dashboardv5', $v_data);
        $this->load->view('v_dashboard/indexv5', $v_data);
        $this->load->view('templates/footer_dashboardv5', $v_data);	
        	 
	}

	public function load_data(){
		$data = $this->M_read->select_pasar();
		echo json_encode($data);	
	}

//dashboard
	public function tambah(){
         $v_data['template'] = '
         <link href="'.base_url().'assets/dashboard5/navbar-top-fixed.css" rel="stylesheet">';

        $v_data['is_aktif'] = 'tambah';
        $v_data['title'] = '<title>SIG | Pasar Tradisional </title>';

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
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('produk','Produk','required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|trim', [
            'required' => 'Silahkan set titik koordinat!',
        ]);

        
        if($this->form_validation->run() == false){
            
            $this->load->view('templates/header_dashboardv5', $v_data);
            $this->load->view('v_dashboard/tambah');
            $this->load->view('templates/footer_dashboardv5', $v_data);
        }else{
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');
            $v_jam_buka = $this->input->post('jam_buka');
            $v_jam_tutup = $this->input->post('jam_tutup');
            $v_produk = $this->input->post('produk');
            $upload_foto = $_FILES['foto']['name'];

            if ($this->input->post('deskripsi') == "" || $this->input->post('deskripsi') == NULL) {
                $v_deskripsi = "-";
            }else {
                $v_deskripsi = $this->input->post('deskripsi');
            }

            if($upload_foto){
        
                // $_FILES['file']['name'] = $_FILES['foto']['name'][$i];
                // $_FILES['file']['type'] = $_FILES['foto']['type'][$i];
                // $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                // $_FILES['file']['size'] = $_FILES['foto']['size'][$i];

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
                        'pasar_produk' => $v_produk,
                        'pasar_status' => '2',
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
                        'pasar_produk' => $v_produk,
                        'pasar_status' => '2',
                        'pasar_foto' => 'default.png'
                ];
            }

            $this->M_create->tambah_pasar($v_data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah! Mohon tunggu diverifikasi admin :)');
            redirect('dashboard/tambah');

        }
	}
	

}