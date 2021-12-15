

<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/>
        <img src="<?= base_url('assets/foto/pasar/'); ?>slide1.jpg">
        </svg>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/>
        <img src="<?= base_url('assets/foto/pasar/'); ?>slide2.jpeg">
        </svg>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/>
        <img src="<?= base_url('assets/foto/pasar/'); ?>slide3.jpg">
        </svg>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container ">

    <!-- Three columns of text below the carousel -->
  

    <!-- START THE FEATURETTES -->

       <div id="mapid" style="width:100%;"></div>

  

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="<?= base_url('assets/'); ?>js/core/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/core/bootstrap.min.js"></script>

    <script src="<?= base_url('assets/dashboard/'); ?>dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>


<script> 
getData_peta();

function getData_peta(){
  $.ajax({
      url: "<?php echo base_url(); ?>dashboard/load_data",
      dataType: "json",
      success: function(data) {
        // console.log(data);
        var datasearch = [];
        for(var i =0;i < data.length; i++){
          if (data[i].latitude != null || data[i].longitude != null) {
            datasearch.push({"titik_koordinat":[data[i].latitude,data[i].longitude], "nama":data[i].pasar_nama});
          }
        }

// console.log(datasearch);

	
        navigator.geolocation.getCurrentPosition(function(location) {
          var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

        
          console.log(location.coords.latitude, location.coords.longitude);

          document.getElementById('mapid').innerHTML = "<div id='data_peta' style='height: 450px;'></div>";
          

          var mymap = new L.Map('data_peta', {zoom: 14, center: new L.latLng([-8.58280355011038, 116.13464826731037]) });

          mymap.addLayer (new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
              '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
              'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
          }));


          var markersLayer = new L.LayerGroup();	
          mymap.addLayer(markersLayer);

          mymap.addControl( new L.Control.Search({
            position:'topleft',	
            layer: markersLayer,
            initial: false,
            collapsed: true,
            zoom: 17
          }) );


          var mylocation = L.marker(latlng).addTo(mymap).bindPopup('Youre location!');


          for(var i =0;i < data.length; i++){
            if (data[i].latitude != null || data[i].longitude != null) {
              
              var icon_map = L.icon({
                  iconUrl: '<?= base_url('assets/foto/pasar/')?>'+data[i].stts_mapicon,
                  iconSize:     [40, 40], // size of the icon
              });

              
              var nama_pasar = data[i].pasar_nama;
              var titik_koordinat = [data[i].latitude, data[i].longitude];
              
              marker = new L.Marker(new L.latLng(titik_koordinat), {title: nama_pasar, icon:icon_map});

              marker.bindPopup("<b>"+data[i].pasar_nama+"</b><br>"+data[i].pasar_alamat+"<br> <div class='row ml-1'><h6><button class='btn btn-sm btn-outline-info' onclick='detail("+data[i].pasar_id+")'>Detail</button></h6><h6><a href='https://www.google.com/maps/dir/?api=1&origin="+location.coords.latitude+","+location.coords.longitude+"&destination="+data[i].latitude+","+data[i].longitude+"' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a></h6></div>");
              
              markersLayer.addLayer(marker);

            }
          }

        });


        
    }
  });
}





function detail(id){
    $('#modal_detail').modal('show');
    
    // console.log(id);
    $.ajax({
        method: 'get',
        url: "<?php echo base_url(); ?>auth/detail_pasar",
        data: {
            id: id
        },
        dataType: "json",
        success: function(data) {

          // console.log(data);
          var url_foto = "<?= base_url(); ?>assets/foto/pasar/"+data.pasar_foto;
      
          $('#foto_detail').attr("src",url_foto);
          $('#nama_detail').html(data.pasar_nama);
          $('#alamat_detail').html(data.pasar_alamat);
          $('#buka_detail').html(data.pasar_jam_buka);
          $('#tutup_detail').html(data.pasar_jam_tutup);

          if (data.pasar_status == "1") {
            var status_content = '<h5><span class="badge badge-success"> '+data.stts_nama+' </span></h5>';
          }else{
            var status_content = '<h5><span class="badge badge-danger"> '+data.stts_nama+'</span></h5>';
          }

          $('#status_detail').html(status_content);

          $('#deskripsi_detail').html(data.pasar_deskripsi);

          document.getElementById('id_modal').value = data.pasar_id;
        }

    });   
  }


</script>

<div class="modal fade bd-example-modal-lg" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog">
  
      <div class="modal-content" >
        
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">      
              Detail data pasar
           </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
                        
        <div class="modal-body">
          
                    <div style="text-align: center;">
                      <img src="" id="foto_detail" alt="" class="avatar avatar-xxl rounded" style="width: 200px; height: 230px;" >
                    </div>
                    <div class="form-group"> 
                        <label for="basic-url">Nama : </label>
                        <div class="form-control" id="nama_detail"></div>
                    </div>
                    <div class="form-group">
                      <label for="basic-url ">Alamat</label>
                        <div class="border rounded pl-2 pb-2 pt-2 pr-2" id="alamat_detail"></div>
                    </div>
                    <div class="form-group">
                      <label for="basic-url ">Jam buka</label>
                        <div class="border rounded pl-2 pb-2 pt-2 pr-2" id="buka_detail"></div>
                    </div>
                    <div class="form-group">
                      <label for="basic-url ">Jam tutup</label>
                        <div class="border rounded pl-2 pb-2 pt-2 pr-2" id="tutup_detail"></div>
                    </div>
                    <div class="form-group"> 
                        <label for="basic-url">Deskripsi </label>
                        <div class="form-control" id="deskripsi_detail"></div>
                    </div>
                    <div class="form-group"> 
                        <label for="basic-url">Status</label>
                        <div class="form-control" id="status_detail"></div>
                    </div>
                    <input type="hidden" id="id_modal">
                    
                  <div class="modal-footer">
                    <button class="btn btn-focus" type="button" data-dismiss="modal">Kembali</button>
                  </div>
                                 
                        </div>
                      </div>
                    </div>
                  </div>
