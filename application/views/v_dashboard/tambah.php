
<main class="container">
  <div class="bg-light p-3 rounded ">
    <h1 class="middle">Tambah Data Pasar </h1>
    <div class="card">
      <div class="card-body">
  
      <form id="form_tambah" method="post" enctype="multipart/form-data" action="<?= base_url('dashboard/tambah'); ?>">
      <div class="row mb-3">
        <div class="col-sm-3">
          <h6 class="mt-2 mb-0">Nama pasar*</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          <input type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>">
          <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-3">
          <h6 class="mt-2 mb-0">Alamat*</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          <input type="text" class="form-control" name="alamat" value="<?= set_value('alamat'); ?>">
          <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-3">
          <h6 class="mt-2 mb-0">Jam buka*</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          <input type="time" class="form-control" name="jam_buka" value="<?= set_value('jam_buka'); ?>">
          <?= form_error('jam_buka', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-3">
          <h6 class="mt-2 mb-0">Jam tutup*</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          <input type="time" class="form-control" name="jam_tutup" value="<?= set_value('jam_tutup');?>"> 
          <?= form_error('jam_tutup', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-3">
          <h6 class="mt-2 mb-0">Produk yg ada di pasar*</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          <textarea class="form-control" name="produk" value="<?= set_value('produk'); ?>"></textarea>
          <?= form_error('produk', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-3">
          <h6 class="mt-2 mb-0">Deskripsi singkat pasar</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          <textarea class="form-control" name="deskripsi" value="<?= set_value('deskripsi'); ?>"></textarea>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-3">
          <h6 class="mt-1 mb-0">Foto pasar</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          <input type="file" class="form-control-file" name="foto" accept="image/*" id="exampleFormControlFile1" multiple="">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-sm-3">
          <h4 class="mt-1 mb-0">Pilih lokasi*</h4>
        </div>
        <div class="col-sm-9 text-secondary">
          <div class="btn-group">
            <div class="form-group"> 
              <input type="text" class="form-control" name="latitude" id="Latitude" value="<?= set_value('latitude'); ?>" readonly="" placeholder="Latitude">
            </div>
            <div class="form-group" style="margin-left: 5px;">  
              <input type="text" class="form-control" name="longitude" id="Longitude" value="<?= set_value('longitude'); ?>" readonly="" placeholder="Longitude">
            </div>
          </div>
          <?= form_error('latitude', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-sm-4">
        <button type="button" class="btn btn-outline-info" onclick="getLocation()">Gunakan lokasi terkini</button>
        </div>
      </div>

      <div class="row mb-3">
        <div id="mapid" style="width:100%;"></div>
      </div>

      <div class="row">
        <div class="col-sm-3">
          <button class="btn btn-primary" type="button" onclick="button_tambah()" value="Submit form"> <i class="fas fa-plus"></i> Tambah Data</button>
        </div>
        
      </div>

      </form>
    </div>
  </div>
  </div>
</main>


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