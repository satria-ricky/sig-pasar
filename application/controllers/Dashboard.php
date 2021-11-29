<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
    	$v_data['list'] = $this->M_bulu_tangkis->selectAllverifikasi();
        $v_data['title'] = '<title>SIG | Pasar Tradisional </title>';

        $v_data['opsi'] = "<a class='dropdown-item text-capitalize' href='".base_url()."/dashboard/tambah'><i class='fas fa-plus fa-sm fa-fw'></i>Tambah data ?</a>";
        $this->load->view('templates/header_dashboard', $v_data);
        $this->load->view('v_dashboard/index', $v_data);
        $this->load->view('templates/footer_dashboard', $v_data);		 
	}

	public function load_data_to_tabel(){
		$data = $this->M_bulu_tangkis->selectAllverifikasi();
		echo json_encode($data);	
	}

//dashboard
	public function tambah(){
               
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('jam_buka','Jam_buka','required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|trim', [
            'required' => 'Silahkan set titik koordinat!',
        ]);

        
        if($this->form_validation->run() == false){
            $v_data['title'] = '<title>SIG | Pasar Tradisional </title>';
            $v_data['opsi'] = "<a class='dropdown-item text-capitalize' href='".base_url()."/dashboard'><i class='fas fa-arrow-left'></i> Kembali ?</a>";
            $this->load->view('templates/header_dashboard', $v_data);
            $this->load->view('v_dashboard/tambah');
            $this->load->view('templates/footer_dashboard', $v_data);
        }else{
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');
            $v_jam_buka = $this->input->post('jam_buka');
            $v_jam_tutup = $this->input->post('jam_tutup');
            $upload_foto = $_FILES['foto']['name'];

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
                        'pasar_status' => '2',
                        'pasar_foto' => 'default.jpg'
                ];
            }

            $this->M_bulu_tangkis->create_bt($v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah! Mohon tunggu diverifikasi admin :)</div>');
            redirect('c_dashboard/tambah');

        }
	}
	





}