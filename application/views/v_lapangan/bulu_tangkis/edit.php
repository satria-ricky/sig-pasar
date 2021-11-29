
        <div class="container-fluid">
          <a href="<?= base_url('c_bulu_tangkis/daftar'); ?>" class="btn btn-info mb-2"><i class="fa fa-arrow-left"></i> Kembali</a>
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
            
            <?= form_open_multipart(); ?>
            <input type="hidden" name="id_lapangan" value="<?= $lapangan['bt_id']; ?>">
                
            <label for="basic-url">Nama Lapangan</label>
                  <div class="form-group ">
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="nama_lapangan" value="<?= $lapangan['bt_nama']; ?>">
                    <?= form_error('nama_lapangan', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <label for="basic-url">Alamat</label>
                  <div class="form-group ">
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="alamat" value="<?= $lapangan['bt_alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="btn-group">
                    <div class="form-group mr-1"> 
                        <label for="basic-url">Latitude</label>
                        <input type="text" class="form-control" id="Latitude" aria-describedby="basic-addon3" name="latitude" value="<?= $lapangan['latitude']; ?>" readonly="">
                    </div>
                    <div class="form-group ">
                       <label for="basic-url">Longitude</label>
                       <input type="text" class="form-control" id="Longitude" aria-describedby="basic-addon3" name="longitude" value="<?= $lapangan['longitude']; ?>" readonly="">
                    </div>
                  </div>


                  <div class="btn-group">
                    <div class="form-group mr-1"> 
                        <label for="basic-url">Jam buka</label>
                        <input type="time" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="jam_buka" value="<?= $lapangan['bt_jam_buka']; ?>">
                        <?= form_error('jam_buka', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group ">
                      <label for="basic-url">Jam tutup</label>
                      <input type="time" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="jam_tutup" value="<?= $lapangan['bt_jam_tutup']; ?>">
                    </div>
                  </div>

                  
                  <label for="basic-url">Status lapangan</label>
                  <div class="form-group ">
                            <select class="custom-select " id="status_lapangan" name="status_lapangan">
                              <option value="">--Pilih status--</option>

                              <?php foreach($list_status as $stts) : ?>
                                <?php if($stts['stts_id'] == $lapangan['bt_status']) : ?>
                                  <option value="<?= $stts['stts_id']; ?>" selected> <?= $stts['stts_nama']; ?> </option>
                                <?php else : ?>
                                  <option value="<?= $stts['stts_id']; ?>"> <?= $stts['stts_nama']; ?> </option>
                                <?php endif; ?>
                              <?php endforeach; ?>
                              
                            </select>
                            <?= form_error('status_lapangan', '<small class="text-danger">', '</small>'); ?>
                  </div>




                  </div>
    </div>
  </div>
</div>

<div class="card">
    <div class="card-body">


                    <div class="form-group mr-1"> 
                        <label for="basic-url">Jumlah lapangan</label>
                        <input type="number" min="1" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="jumlah_lapangan" value="<?= $lapangan['bt_jumlah']; ?>">
                        <?= form_error('jumlah_lapangan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group ">
                      <label for="basic-url">Biaya sewa/lapangan (Rp.)</label>
                      <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="biaya_sewa" value="<?= $lapangan['bt_biaya']; ?>">
                    </div>

                <label for="basic-url">Kontak</label>
                  <div class="form-group ">
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="kontak" value="<?= $lapangan['bt_kontak']; ?>">
                  </div>

                  <label for="basic-url">Foto</label>
                    <div class="mb-2">
                    <img src="<?= base_url('assets/foto/bt/').$lapangan['bt_foto']; ?>" width="100" class="card-img" style="width: 10rem;"> 
                    </div>
                    <div class="custom-file">
                      <input type="file" accept="image/*" class="custom-file-input" name="foto">
                      <label class="custom-file-label" for="customFile">Ganti foto?</label>
                    </div>
                  <hr>
                  <div class="row float-right mr-1"> 
                      <button type="submit" onclick="return confirm('Yakin ingin mengubah data lapangan?');" class="btn btn-primary">Simpan</button>   
                  </div>
            <?= form_close(); ?>
          </div>
  
</div>
        </div>
      </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
<script> 



    var edit_lat = $("#Latitude").val();
    var edit_long = $("#Longitude").val();


    function get_peta_by_kab() {

      var id_kab = $("#kabupaten").val();
        

      if(id_kab.length != 0){
        // console.log("ini kab ="+id_kab);
        get_kab_by_id(id_kab);
      }
      else{
        // console.log("kosong");
        getData_peta();
      }

    }

 getData_peta();

  
  
  

function getData_peta(){
  $.ajax({
        url: "<?php echo base_url(); ?>c_dashboard/load_data_to_tabel",
        type: "post",
        
        dataType: "json",
        success: function(data) {
            // console.log(data);
  
          document.getElementById('mapid').innerHTML = "<div id='data_peta' style='height: 450px;'></div>";
        
          var curLocation=[edit_lat, edit_long];
          if (curLocation[0]==0 && curLocation[1]==0) {
            curLocation =[-8.58280355011038, 116.13464826731037]; 
          }else{
            curLocation =[edit_lat, edit_long];
          }

          var mymap = L.map('data_peta').setView([-8.58280355011038, 116.13464826731037], 12);
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

alert('Titik koordinat berhasil di set!');

}



</script>