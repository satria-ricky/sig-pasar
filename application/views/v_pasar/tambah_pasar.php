<div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
              
            <div class="page-header text-white">
              <h4 class="page-title text-white">Pasar</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                  <a href="#">
                    <i class="flaticon-home text-white"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item ">
                  <a href="#" class="text-white">Tambah data</a>
                </li>
              </ul>
            </div>

          
          </div>
        </div>


        <div class="page-inner mt--5">
          <div class="row mt--2">





          <div class="col-md-12">
              <div class="card">

                <div class="card-body"> 
                    <?= form_open_multipart('admin/tambah_data'); ?>
                      <div class="form-group">
                        <label for="email2">Nama pasar*</label>
                        <input type="text" class="form-control" name="nama" placeholder="Enter nama pasar" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="comment">Alamat*</label>
                         <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                      </div>

                      <div class="form-group">
                        <label for="comment">Jam buka*</label>
                         <input type="time" class="form-control" name="jam_buka" value="<?= set_value('jam_buka'); ?>">
                        <?= form_error('jam_buka', '<small class="text-danger">', '</small>'); ?>
                      </div>

                      <div class="form-group">
                        <label for="comment">Jam tutup*</label>
                         <input type="time" class="form-control" name="jam_tutup" value="<?= set_value('jam_tutup'); ?>">
                        <?= form_error('jam_tutup', '<small class="text-danger">', '</small>'); ?>
                      </div>

                      <div class="form-group">
                        <label for="comment">Deskripsi</label>
                         <textarea class="form-control" name="deskripsi"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlFile1">Foto pasar</label>
                        <input type="file" class="form-control-file" accept="image/*" id="exampleFormControlFile1" name="foto">
                      </div>

                      <div class="form-group">
                        <div class="row">
    			                <div class="col-sm-3">
    			                  <h4 class="mt-3">Pilih lokasi*</h4>
    			                </div>
    			                <div class="col-sm-9 text-secondary">
    			                  <div class="btn-group">
    			                    <div class="form-group mr-1"> 
    			                      <input type="text" class="form-control" name="latitude" id="Latitude" value="<?= set_value('latitude'); ?>" readonly="" placeholder="Latitude">
    			                    </div>
    			                    <div class="form-group mr-1">  
    			                      <input type="text" class="form-control" name="longitude" id="Longitude" value="<?= set_value('longitude'); ?>" readonly="" placeholder="Longitude">
    			                    </div>
    			                  </div>
    			                  <?= form_error('latitude', '<small class="text-danger">', '</small>'); ?>
    			                </div>
    		              	</div>
                      </div>

                      <div class="form-group">
                        <div class="row">
			                <div class="col-sm-4">
			                	<button type="button" class="btn btn-outline-info" onclick="getLocation()">Gunakan lokasi terkini</button>
			                </div>
		              	</div>
                      </div>

                      <div class="form-group">
                        <div class="row">
    			                <div id="mapid" style="width:100%;"></div>
    		              	</div>
                      </div>

                      <button type="button" class="btn btn-primary float-right mr-2" id="button_tambah">
                        <span class="btn-label">
                          <i class="fa fa-plus"></i>
                        </span>
                        Tambah
                      </button>
                    <?= form_close(); ?>
                </div>
              </div>
            </div>




            
              </div>
            </div>
          </div>



 
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



$('#button_tambah').click(function(e) {
    swal({
      title: 'Tambah data ?',
      icon: 'warning',
      buttons:{
        confirm: {
          text : 'Iya',
          className : 'btn btn-success'
        },
        cancel: {
          text : 'Tidak',
          visible: true,
          className: 'btn btn-focus'
        }
      }
    }).then((tambahkoe) => {
      if (tambahkoe) {
        $('form').submit();
      } else {
        swal.close();
      }
    });

  });


</script>


<?php if($this->session->flashdata('pesan')){ ?>
  <script>
    swal("<?php echo $this->session->flashdata('pesan'); ?>", {
        icon : "success",
        buttons: {                  
            confirm: {
                className : 'btn btn-success'
            }
        },
    });
  </script>
<?php } ?>