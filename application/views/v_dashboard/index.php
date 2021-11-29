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
            <a class="nav-link page-scroll" href="#data_lapangan" >Data</a>
            <a class="nav-link page-scroll" href="#peta_lapangan" >Map</a>
            <!-- <a class="nav-link page-scroll" href="<?= base_url(); ?>c_login">Log in</a> -->

            <li class="nav-item dropdown no-arrow ">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                 <!-- <i class="fas fa-cog ml-2"></i>  -->
                 Aksi
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item text-capitalize" href="<?= base_url(); ?>c_dashboard/tambah">
                  <i class="fas fa-plus fa-sm fa-fw"></i>
                  Tambah data lapangan ?
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

    <!-- end of navbar -->

<!-- jumbotron -->

<div class="jumbotron jumbotron-fluid">
  <!-- <div class="container"> -->
  
    	<img src="<?= base_url('assets/foto/'); ?>bg.jpg" class="img-fluid" alt="Responsive image" style="width:1350px;  height: 300px; align:center;">
    
    <!-- <p class="lead"></p>
  </div> -->
</div>	

<!-- <div id="result">ppp </div> -->


<!-- end of jumbotron -->

<!-- body -->


	<div class="container-fluid" id="data_lapangan">

       
          
          <div class="card shadow mb-4 mr-5 ml-5">
            <div class="card-header py-3">
              <h4 class="font-weight-bold"> Daftar Lapangan</h4>  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="data_tabel" width="100%" cellspacing="0">
                  <thead>
                    <tr>
  		                <th>Nama</th>
	                    <th>Alamat</th>
	                    <th>Aksi</th> 
                    </tr>
                  </thead>
                </table>
              </div>

              </div>
            </div>
          </div>
          
        </div>

<!-- end of body -->



	
	<div  style="margin-top: 100px;"></div>

      <div class="container-fluid" id="peta_lapangan">

          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="font-weight-bold "> Peta Lokasi </h4>  
            </div>
              <div id="mapid" style="height: 450px;"></div>
            </div>
          </div>
          
        </div>



<div class="section section-lg text-white" id="contact_us" style="padding-bottom:25px; padding-top: 25px; background-color:#008B8B;">
        <div class="container">
            <div class="text-center">
                &copy; Copyright. Zaenalabidin (1800330024)
            </div>
        </div>
    </div>


</body>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/dashboard/'); ?>script.js"></script>
  
  
<script> 

  getData();
    function getData(){

      navigator.geolocation.getCurrentPosition(function(location) { 
        console.log("ini titik : "+location.coords.latitude, location.coords.longitude);

    
      
      $.ajax({
            url: "<?php echo base_url(); ?>c_dashboard/load_data_to_tabel",
            dataType: "json",
            success: function(data) {
                // console.log(data);
                
                var i = 1;
                 $('#data_tabel').DataTable( {
                  "data": data,
                  "columns": [
                        {
                            "data": "bt_nama"
                        },
                        {
                            "data": "bt_alamat"
                        },
                        {
                            "data": "bt_id",
                            "render": function(data, type, row, meta) {
                            return `
                              <a href="${row.bt_id}" class="badge badge-primary" data-toggle="modal" data-target="#modal_detail${row.bt_id}" >Detail</a>
                              
                              <a href='https://www.google.com/maps/dir/?api=1&origin=${location.coords.latitude},${location.coords.longitude}&destination=${row.latitude},${row.longitude}' class="badge badge-success" target="_blank">Rute</a>
                            `;
                            }
                        }
              ]
          } );
            }
        });
      
      });


    } 


</script>



<!-- PETA -->

<script> 
getData_peta();

function getData_peta(){
  $.ajax({
        url: "<?php echo base_url(); ?>c_dashboard/load_data_to_tabel",
        dataType: "json",
        success: function(data) {
            // console.log(data);

//load data

      var datasearch = [];
      for(var i =0;i < data.length; i++){
        if (data[i].latitude != null || data[i].longitude != null) {
          datasearch.push({"titik_koordinat":[data[i].latitude,data[i].longitude], "nama":data[i].bt_nama});
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
                iconUrl: '<?= base_url('assets/foto/bt/mapicon/')?>'+data[i].stts_mapicon,
                iconSize:     [40, 40], // size of the icon
            });

            
            var nama_bt = data[i].bt_nama;
            var titik_koordinat = [data[i].latitude, data[i].longitude];
            
            marker = new L.Marker(new L.latLng(titik_koordinat), {title: nama_bt, icon:icon_map});

            marker.bindPopup("<b>"+data[i].bt_nama+"</b><br>"+data[i].bt_alamat+"<br> <div class='row ml-1'><h6><a href='"+data[i].bt_id+"' class='btn btn-sm btn-outline-info' data-toggle='modal' data-target='#modal_detail"+data[i].bt_id+"'>Detail</a></h6><h6><a href='https://www.google.com/maps/dir/?api=1&origin="+location.coords.latitude+","+location.coords.longitude+"&destination="+data[i].latitude+","+data[i].longitude+"' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a></h6></div>");
            
            markersLayer.addLayer(marker);

      }
    }

  });
        }

    });

}
</script>

<?php foreach($list as $bt ) : ?>
  <div class="modal fade" id="modal_detail<?= $bt['bt_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">
                <p>Detail Data Lapangan </p>
             </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        
                        <div class="modal-body">
                        <img src="<?= base_url('assets/foto/bt/').$bt['bt_foto']; ?>" alt="" width="100%" class="card-img mb-2" style="width: 100%;">
                              <table class="table table-bordered">
                                <tbody>
                                  <tr>
                                    <td>Nama</td>
                                    <td><?= $bt['bt_nama']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Alamat</td>
                                    <td><?= $bt['bt_alamat']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Jam buka </td>
                                    <td><?= $bt['bt_jam_buka']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Jam tutup </td>
                                    <td><?= $bt['bt_jam_tutup']; ?></td>
                                  </tr>
                                  <tr>
                                  <td>Jumlah lapangan</td>
                                    <td><?= $bt['bt_jumlah']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Biaya sewa/lapangan (Rp.)</td>
                                    <td><?= $bt['bt_biaya']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Kontak</td>
                                    <td><?= $bt['bt_kontak']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Longitude</td>
                                    <td><?= $bt['longitude']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Latitude</td>
                                    <td><?= $bt['latitude']; ?></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                  </div>
          
<?php endforeach; ?>