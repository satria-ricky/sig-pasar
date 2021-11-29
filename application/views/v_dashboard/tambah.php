
<main>
	<div class="container-fluid" style="margin-top: 60px;">

    <?= $this->session->flashdata('pesan'); ?>

    <?= form_open_multipart(); ?>
    <div class="card">
            <div class="card-header">
            
                <h4>Tambah data pasar</h4>      
              
            </div>

              <div class="card-body">
            
              
              
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mt-2 mb-0">Nama pasar</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="nama">
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mt-2 mb-0">Alamat</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="alamat">
                  <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mt-2 mb-0">Jam buka</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="time" class="form-control" name="jam_buka">
                  <?= form_error('jam_buka', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mt-2 mb-0">Jam tutup</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="time" class="form-control" name="jam_tutup">
                  <?= form_error('jam_tutup', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mt-1 mb-0">Foto pasar</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="file" class="form-control-file" name="foto" accept="image/*" id="exampleFormControlFile1">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-3">
                  <h4 class="mt-1 mb-0">Pilih lokasi:</h4>
                </div>
                <div class="col-sm-9 text-secondary">
                  <button type="button" class="btn btn-outline-info btn-sm ml-auto mr-2" onclick="getLocation()">Gunakan lokasi terkini</button>
                  <input type="hidden" name="Latitude" id="Latitude">
                  <input type="hidden" name="Longitude" id="Longitude">
                </div>
              </div>
              
              <div class="row mb-3">
                <div id="mapid" style="width:100%;"></div>
              </div>

              <div class="row ml-auto">
                <button class="btn btn-primary" id="tambah"> Tambah </button>
                  <?= form_close(); ?>
              </div>
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
            alert('Titik lokasi berhasil di tambahkan!');
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