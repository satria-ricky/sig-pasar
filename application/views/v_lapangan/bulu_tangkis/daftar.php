

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <a href="<?= base_url('c_bulu_tangkis/tambah'); ?>" class="btn btn-info mb-2"><i class="fa fa-plus"></i> Tambah data</a>


          <?= $this->session->flashdata('pesan'); ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
          <div class="card-header py-3">
              <div class="btn-group ">
                
                <select class="custom-select ml-2 mr-2" id="nama_status">
                      <option value="">--Pilih Status Data Lapangan--</option>
                </select>

                    <button type="button" id="filter_status" class="btn btn-primary btn-sm ml-2 mr-2">Filter</button> 

              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="data_tabel" width="100%" cellspacing="0">
                  <thead style="text-align:center">
                    <tr>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Status</th>
                      <th>Aksi</th> 
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

        <div  style="margin-top: 50px;"></div>

<div class="container-fluid" id="peta_lapangan">
  
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h4 class="font-weight-bold "> Peta Lokasi </h4>  
      </div>
        <div id="mapid" style="height: 450px;"></div>
      </div>
    </div>
    
  
<!-- Modal -->

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
                                    <td>Jam buka : <?= $bt['bt_jam_buka']; ?> </td>
                                    <td>Jam tutup : <?= $bt['bt_jam_tutup']; ?> </td>
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
                                  <tr>
                                    <td> <b>Status</b></td>
                                    <td>
                                      <?php if ($bt['bt_status'] == '1') {?>
                                        <h5 class="text-center"><span class="badge badge-success"><?= $bt['stts_nama']; ?></span></h5>
                                      <?php } else {?>
                                        <h5 class="text-center"><span class="badge badge-danger"><?= $bt['stts_nama']; ?></span></h5>
                                      <?php }?>
                                    </td>
                                  </tr>  
                                </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                  </div>
          
<?php endforeach; ?>

      </div>
      <!-- End of Main Content -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">

    function getData(id){
      // console.log(id);

      navigator.geolocation.getCurrentPosition(function(location) { 
        console.log("ini titik : "+location.coords.latitude, location.coords.longitude);


      $.ajax({
            url: "<?php echo base_url(); ?>c_bulu_tangkis/load_data_to_tabel",
            type: "post",
            data: {
                stts_id : id
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
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
                              if(row.bt_status == '1'){
                                return `<h6 class="text-center"><span class="badge badge-success">${row.stts_nama}</span></h6>`;
                                }
                              else{
                                return `<h6 class="text-center"><span class="badge badge-danger">${row.stts_nama}</span></h6>`;
                              }
                            }
                        },
                        {
                            "data": "bt_id",
                            "render": function(data, type, row, meta) {
                            return `
                            <h6 class="text-center"><a href="${row.bt_id}" class="badge badge-primary" data-toggle="modal" data-target="#modal_detail${row.bt_id}" >Detail</a> <a href='<?= base_url('c_bulu_tangkis/edit/')?>${row.bt_id}' class="badge badge-success">Edit</a> <a href='<?= base_url('c_bulu_tangkis/hapus/')?>${row.bt_id}' class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data lapangan?');">Hapus</a>
                            <a href='https://www.google.com/maps/dir/?api=1&origin=${location.coords.latitude},${location.coords.longitude}&destination=${row.latitude},${row.longitude}' class="badge badge-success" target="_blank">Rute</a></h6>
                            `;
                            }
                        }
                  ]
          } );
            }
        });
      });
    } 
    getData();


    function getstatus() {
        $.ajax({
            url: "<?php echo base_url(); ?>c_bulu_tangkis/load_status",
            type: "post",
            dataType: "json",
            success: function(data) {
                // console.log(data)
                var statusBody = "";
                for(var key in data){
                  statusBody +=`<option value="${data[key]['stts_id']}">${data[key]['stts_nama']}</option>`;
                }
                $("#nama_status").append(statusBody);
            }
        });
    }
    getstatus();


     $(document).on("click", "#filter_status", function(e) {
        e.preventDefault();

        
        var id_status = $("#nama_status").val();
         
        if(id_status.length != 0){
          // console.log("ini stts ="+id_status);
          $('#data_tabel').DataTable().destroy();
          getData(id_status);
          getData_peta(id_status);
        }
        else{
          $('#data_tabel').DataTable().destroy();
          getData();
          getData_peta();
          // console.log("gk ada = "+id_status);
        }


         

    });

</script>

<script> 
getData_peta();

function getData_peta(id){
  $.ajax({
        url: "<?php echo base_url(); ?>c_bulu_tangkis/load_data_to_tabel",
        type: "post",
        data: {
            stts_id : id
        },
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
