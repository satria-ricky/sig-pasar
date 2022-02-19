


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



<main class="container">
  <div class="bg-light p-3 rounded">
    <h1>Peta Lokasi Pasar </h1>
     <div id="mapid" style="width:100%;"></div>
  </div>
</main>


 
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


