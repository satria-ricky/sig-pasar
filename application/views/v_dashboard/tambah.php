<!doctype html>
<html lang="en" id="home">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->

  

  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> -->



<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>

  <link rel="stylesheet" href="<?= base_url() ?>leaflet-locatecontrol/dist/L.Control.Locate.min.css" />
<script src="<?= base_url() ?>leaflet-locatecontrol/src/L.Control.Locate.js"></script>

<link rel="stylesheet" href="<?= base_url() ?>leaflet-search/src/leaflet-search.css" />
<script src="<?= base_url() ?>leaflet-search/src/leaflet-search.js"></script>





    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>style.css">

     <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/foto/'); ?>icon_bt.jpg">

     <!-- fonts  -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">


    <title>Bulu Tangkis - Kota Mataram</title>
  </head>
  <body>
        
    <!-- navbar -->
      


    	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container"> 
        <a class="navbar-brand font-weight-bolder page-scroll" href="#home"> BULU TANGKIS - KOTA MATARAM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto" >
           
            <li class="nav-item dropdown no-arrow ">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                 <!-- <i class="fas fa-cog ml-2"></i>  -->
                 Aksi
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item text-capitalize" href="<?= base_url(); ?>c_dashboard">
                  <i class="fa fa-arrow-left"></i>
                  Lihat data lapangan
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-capitalize" href="<?= base_url(); ?>c_login">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw"></i> Login
                </a>
              </div>
            </li>

          </div>
        </div>
      </div>
    </nav>



	<div class="container-fluid" style="margin-top: 60px;">
    <h4 class="ml-2 mt-2 font-weight-bold "> <i class="fas fa-plus fa-sm fa-fw"> </i>  Tambah data lapangan</h4>

    <?= $this->session->flashdata('pesan'); ?>

<div class="row">
  <div class="col-sm-7">
    <div class="card">
            <div class="card-header">
              <div class="row ">
                <h4 class="ml-2">Pilih lokasi:</h4>      
                <button type="button" class="btn btn-outline-info btn-sm ml-auto mr-2" onclick="getLocation()">Gunakan lokasi saya</button>
            </div>
                
            </div>
                <div id="mapid" style="height: 450px;"></div>
    </div>
  </div>

  <div class="col-sm-5">
    <div class="card">
            <div class="card-header">
            
                <h4>Isi data:</h4>      
              
            </div>

              <div class="card-body">
            
                <?= form_open_multipart('c_dashboard/tambah'); ?>
                

                  <label for="basic-url">Nama Lapangan</label>
                  <div class="form-group ">
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="nama_lapangan" value="<?= set_value('nama_lapangan'); ?>">
                    <?= form_error('nama_lapangan', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <label for="basic-url">Alamat</label>
                  <div class="form-group ">
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="alamat" value="<?= set_value('alamat'); ?>">
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="btn-group">
                    <div class="form-group mr-1"> 
                        <label for="basic-url">Latitude</label>
                        <input type="text" class="form-control" id="Latitude" aria-describedby="basic-addon3" name="latitude" readonly="" required>
                    </div>
                    <div class="form-group ">
                       <label for="basic-url">Longitude</label>
                       <input type="text" class="form-control" id="Longitude" aria-describedby="basic-addon3" name="longitude" readonly="" required>
                    </div>
                  </div>


                  <div class="btn-group">
                    <div class="form-group mr-1"> 
                        <label for="basic-url">Jam buka</label>
                        <input type="time" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="jam_buka" value="<?= set_value('jam_buka'); ?>">
                        <?= form_error('jam_buka', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group ">
                      <label for="basic-url">Jam tutup</label>
                      <input type="time" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="jam_tutup" value="<?= set_value('jam_tutup'); ?>">
                    </div>
                  </div>
                  
                  
                  
                  </div>




                </div>
    </div>
  </div>
</div>

<div class="card">
    <div class="card-body">

                    <div class="form-group mr-1"> 
                        <label for="basic-url">Jumlah lapangan</label>
                        <input type="number" min="1" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="jumlah_lapangan" value="<?= set_value('jumlah_lapangan'); ?>">
                        <?= form_error('jumlah_lapangan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group ">
                      <label for="basic-url">Biaya sewa/lapangan (Rp.)</label>
                      <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="biaya_sewa" value="<?= set_value('biaya_sewa'); ?>">
                    </div>


                <label for="basic-url">Kontak</label>
                  <div class="form-group ">
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="kontak" value="<?= set_value('kontak'); ?>">
                  </div>

                  <label for="basic-url">Foto</label>
                  <div class="custom-file">
                    <input type="file" accept="image/*" class="custom-file-input" name="foto">
                    <label class="custom-file-label" for="customFile">Pilih foto</label>
                  </div>
                  <hr>
                  <div class="row float-right mr-1"> 
                      <button type="submit" onclick="return confirm('Yakin ingin menambah data lapangan?');" class="btn btn-primary">Simpan</button>   
                  </div>
                <?= form_close(); ?>
              </div>
</div>
        </div>
      </div>
      










	



    <div class="section section-lg text-white" style="padding-bottom:25px; padding-top: 25px; background-color:#008B8B; bottom: 0; width:100%; margin-top:25px;">
        <div class="container">
            <div class="text-center">
                &copy; Copyright. Zaenalabidin (1800330024)
            </div>
        </div>
    </div>


</body>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    
<script> 
getData_peta();
function getData_peta(){
  $.ajax({
        url: "<?php echo base_url(); ?>c_dashboard/load_data_to_tabel",
        dataType: "json",
        success: function() {
            // console.log(data);
  
          document.getElementById('mapid').innerHTML = "<div id='data_peta' style='height: 450px;'></div>";
        
          var curLocation=[0,0];
          if (curLocation[0]==0 && curLocation[1]==0) {
            curLocation =[-8.58280355011038, 116.13464826731037]; 
          }

          var mymap = L.map('data_peta').setView([-8.58280355011038, 116.13464826731037], 13);
          L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
          }).addTo(mymap);

          mymap.attributionControl.setPrefix(false);
          var marker = new L.marker(curLocation, {
            draggable:'true'
          });

          marker.on('dragend', function(event) {
          var position = marker.getLatLng();
          marker.setLatLng(position,{
            draggable : 'true'
            }).bindPopup(position).update();
            $("#Latitude").val(position.lat);
            $("#Longitude").val(position.lng).keyup();
            console.log(position.lat, position.lng)

          });

          $("#Latitude, #Longitude").change(function(){
            var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
            marker.setLatLng(position, {
            draggable : 'true'
            }).bindPopup(position).update();
            mymap.panTo(position);
          });
          mymap.addLayer(marker);


        }

  });


}


function getLocation() {

  navigator.geolocation.getCurrentPosition(function(location) {
          var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

          //map view 
          console.log(location.coords.latitude, location.coords.longitude);

          document.getElementById("Latitude").value = location.coords.latitude;
          document.getElementById("Longitude").value = location.coords.longitude;

        });
        alert('Titik lokasi berhasil di tambahkan!');
}



</script>