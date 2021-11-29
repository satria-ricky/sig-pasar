<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
    	$v_data['list'] = $this->M_bulu_tangkis->selectAllverifikasi();
        $this->load->view('v_dashboard/index', $v_data);		 
	}

	public function load_data_to_tabel(){
		$data = $this->M_bulu_tangkis->selectAllverifikasi();
		echo json_encode($data);	
	}

//dashboard
	public function tambah(){
               
        $this->form_validation->set_rules('nama_lapangan', 'Nama_lapangan', 'required|trim', [
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

        $this->form_validation->set_rules('jumlah_lapangan','Jam_buka','required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        
        if($this->form_validation->run() == false){
            $this->load->view('v_dashboard/tambah');
        }else{
            $v_nama     = $this->input->post('nama_lapangan');
            $v_alamat = $this->input->post('alamat');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');
            $v_jam_buka = $this->input->post('jam_buka');
            $v_jam_tutup = $this->input->post('jam_tutup');
            $v_jumlah_lapangan = $this->input->post('jumlah_lapangan');
            $v_biaya_sewa = $this->input->post('biaya_sewa');
            $v_kontak = $this->input->post('kontak');
            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/bt/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');             
                    $v_data = [
                        'bt_nama' => $v_nama,
                        'bt_alamat' => $v_alamat,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'bt_jam_buka' => $v_jam_buka,
                        'bt_jam_tutup' => $v_jam_tutup,
                        'bt_status' => '2',
                        'bt_jumlah' => $v_jumlah_lapangan,
                        'bt_biaya' => $v_biaya_sewa,
                        'bt_kontak' => $v_kontak,
                        'bt_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                    'bt_nama' => $v_nama,
                    'bt_alamat' => $v_alamat,
                    'longitude' => $v_longitude,
                    'latitude' => $v_latitude,
                    'bt_jam_buka' => $v_jam_buka,
                    'bt_jam_tutup' => $v_jam_tutup,
                    'bt_status' => '2',
                    'bt_jumlah' => $v_jumlah_lapangan,
                    'bt_biaya' => $v_biaya_sewa,
                    'bt_kontak' => $v_kontak,
                    'bt_foto' => 'bt_default.jpg'
                ];
            }

            $this->M_bulu_tangkis->create_bt($v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah! Mohon tunggu diverifikasi admin :)</div>');
            redirect('c_dashboard/tambah');

        }
	}
	





}