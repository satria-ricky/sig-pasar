<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'third_party/PHPExcel/PHPExcel.php';

class C_bulu_tangkis extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_login();
        $this->load->library('googlemaps');
    }


    function validasi_status_data($id)
    {
        if($id == ""){
            $this->form_validation->set_message('validasi_status_data', 'Pilih status data lapangan!');
            return false;
        } else{
            return true;
        }

    }

//BERANDA
    public function load_verif(){
    
            $output = '
            
            <div class="col-xl-3 col-md-6 mb-3 mt-2 ml-2" onclick="lapangan()" style="cursor: pointer;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-large font-weight-bold text-success text-uppercase mb-1">Diverifikasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 

                        '.$this->M_bulu_tangkis->total_bt(1).'

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-gear fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
            

            <div class="col-xl-3 col-md-6 mb-3 mt-2 ml-2" onclick="lapangan()" style="cursor: pointer;">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-large font-weight-bold text-danger text-uppercase mb-1">Tidak diverifikasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 

                        '.$this->M_bulu_tangkis->total_bt(2).'

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-gear fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div> 
            </div>'
            
            
            ;

            echo json_encode($output);

    }

    public function beranda(){  
        
        $v_data['judul'] = 'BERANDA';
    
        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username); 
        $v_data['tittle'] = 'Beranda';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar', $v_data);
        $this->load->view('v_beranda/index',$v_data);
        $this->load->view('templates/footer');
        
    }

//DAFTAR LAPANGAN
    
    public function load_status(){
        $data = $this->M_bulu_tangkis->select_status();
        echo json_encode($data);	
    }    

    public function load_data_to_tabel(){
        $v_status = $this->input->post('stts_id');

       if( strlen($v_status) != 0 ){
        
            $data = $this->M_bulu_tangkis->selectAllbyStatus($v_status);  

        }else{
           
            $data = $this->M_bulu_tangkis->select_bulu_tangkis();
        }

            echo json_encode($data);

    }



    public function daftar(){
        $v_data['judul'] = 'DAFTAR LAPANGAN';

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['list'] = $this->M_bulu_tangkis->select_bulu_tangkis();

        $v_data['tittle'] = 'Daftar lapangan';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar',$v_data);
        $this->load->view('v_lapangan/bulu_tangkis/daftar', $v_data);
        $this->load->view('templates/footer');
    }


    
    public function edit($v_id)
    {
        $v_data['judul'] = 'EDIT DATA LAPANGAN';

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['lapangan'] = $this->M_bulu_tangkis->select_by_id($v_id);    
        $v_data['list_status'] = $this->M_bulu_tangkis->select_status();   
        $v_data['tittle'] = 'Edit data lapangan';
        

        $this->form_validation->set_rules('nama_lapangan', 'Nama_lapangan', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('jam_buka','Jam_buka','required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('jumlah_lapangan','Jam_buka','required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('status_lapangan','Status_lapangan','required|callback_validasi_status_data');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_lapangan/bulu_tangkis/edit', $v_data);
            $this->load->view('templates/footer');

        }
        else{
            $v_id = $this->input->post('id_lapangan');
            $v_nama   = $this->input->post('nama_lapangan');
            $v_alamat = $this->input->post('alamat');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');
            $v_jam_buka = $this->input->post('jam_buka');
            $v_jam_tutup = $this->input->post('jam_tutup');
            $v_status = $this->input->post('status_lapangan');
            $v_kontak = $this->input->post('kontak');
            $v_jumlah_lapangan = $this->input->post('jumlah_lapangan');
            $v_biaya_sewa = $this->input->post('biaya_sewa');
            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/bt/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){ 
                    $v_nama_foto = $this->upload->data('file_name');
                    
                    $v_foto_lama = $v_data['lapangan']['bt_foto'];
                    
                    if($v_foto_lama != 'bt_default.jpg'){
                        unlink(FCPATH . 'assets/foto/bt/' . $v_foto_lama);
                    }
                    
                    $v_data = [
                        'bt_nama' => $v_nama,
                        'bt_alamat' => $v_alamat,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'bt_jam_buka' => $v_jam_buka,
                        'bt_jam_tutup' => $v_jam_tutup,
                        'bt_status' => $v_status,
                        'bt_kontak' => $v_kontak,
                        'bt_jumlah' => $v_jumlah_lapangan,
                        'bt_biaya' => $v_biaya_sewa,
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
                    'bt_status' => $v_status,
                    'bt_kontak' => $v_kontak,
                    'bt_jumlah' => $v_jumlah_lapangan,
                    'bt_biaya' => $v_biaya_sewa
                ];
            }

            $this->M_bulu_tangkis->edit_bt($v_id, $v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect('c_bulu_tangkis/daftar');
        }


    }


//TAMBAH DATA LAPANGAN

    public function tambah(){
        $v_data['judul'] = 'TAMBAH DATA LAPANGAN';

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['list_status'] = $this->M_bulu_tangkis->select_status();

        $v_data['tittle'] = 'Tambah data lapangan';

        
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

        $this->form_validation->set_rules('status_lapangan','Status_lapangan','required|callback_validasi_status_data');


        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_lapangan/bulu_tangkis/tambah', $v_data);
            $this->load->view('templates/footer');

        }
        else{
            $v_nama     = $this->input->post('nama_lapangan');
            $v_alamat = $this->input->post('alamat');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');
            $v_jam_buka = $this->input->post('jam_buka');
            $v_jam_tutup = $this->input->post('jam_tutup');
            $v_status = $this->input->post('status_lapangan');
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
                        'bt_status' => $v_status,
                        'bt_kontak' => $v_kontak,
                        'bt_jumlah' => $v_jumlah_lapangan,
                        'bt_biaya' => $v_biaya_sewa,
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
                    'bt_status' => $v_status,
                    'bt_kontak' => $v_kontak,
                    'bt_jumlah' => $v_jumlah_lapangan,
                    'bt_biaya' => $v_biaya_sewa,
                    'bt_foto' => 'bt_default.jpg'
                ];
            }

            $this->M_bulu_tangkis->create_bt($v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_bulu_tangkis/tambah');

        }
    }


    public function hapus($v_id){
        $hapus_foto = $this->M_bulu_tangkis->select_by_id($v_id);
        
        if($hapus_foto['bt_foto'] != 'bt_default.jpg'){
            unlink(FCPATH . 'assets/foto/bt/' . $hapus_foto['bt_foto']);
        }
        
        $this->M_bulu_tangkis->hapus_bt($v_id);
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('c_bulu_tangkis/daftar');
    }







}