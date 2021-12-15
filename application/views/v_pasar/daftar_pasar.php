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
                  <a href="#" class="text-white">Daftar pasar</a>
                </li>
              </ul>
            </div>
          </div>
        </div>


        <div class="page-inner mt--5">
          <div class="row mt--2">
         

            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="btn-group ">
                    <select class="custom-select ml-2 mr-2" id="status_filter" name="status" >
                          <option value="">--Pilih status--</option>
                    </select>
                    <button type="button" id="filter" class="btn btn-primary btn-sm ml-2 mr-2">Filter</button> 
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                        <tr class="text-center">
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Jam buka</th>
                          <th>Status</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="btn-group ">
                    <h4> PETA PASAR </h4> 
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <div id="mapid" style="width:100%;"></div>
                  </div>
                </div>
              </div>
            </div>




            
              </div>
            </div>
          </div>


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

 
<script type="text/javascript">
  get_pasar();
  function get_pasar(id_status){

    $.ajax({
            url: "<?php echo base_url(); ?>admin/load_data_pasar",
            type: "post",
            data: {
                id_status : id_status
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);

                 $('#basic-datatables').DataTable( {
                    "data": data,
                    "columns": [
                        {
                            "data": "pasar_nama"
                        },
                        {
                            "data": "pasar_alamat"
                        },
                        {
                            "data": "pasar_jam_buka"
                        },
                        {
                            "data": "pasar_status",
                            "render": function(data, type, row, meta) {
                              if(row.pasar_status == '1'){
                                return `<h6 class="text-center"><span class="badge badge-success">${row.stts_nama}</span></h6>`;
                                }
                              else{
                                return `<h6 class="text-center"><span class="badge badge-danger">${row.stts_nama}</span></h6>`;
                              }
                            }
                        },
                        {
                            "data": "pasar_id",
                            "render": function(data, type, row, meta) {
                            return `
                              <button class="btn btn-primary btn-xs btn-round" onclick="detail(${row.pasar_id})">Detail</button>
                              <button class="btn btn-success btn-xs btn-round m-0" onclick="edit(${row.pasar_id})">Edit</button>
                              <button class="btn btn-danger btn-xs btn-round" onclick="hapus(${row.pasar_id})"> Hapus </button> 
                            `;
                            }
                        }
                      ]
                  } );



//PETA PASAR
                  var datasearch = [];
                  for(var i =0;i < data.length; i++){
                    if (data[i].latitude != null || data[i].longitude != null) {
                      datasearch.push({"titik_koordinat":[data[i].latitude,data[i].longitude], "nama":data[i].pasar_nama});
                    }
                  }


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




function hapus(id) {
    swal({
      title: 'Yakin dihapus?',
      text: 'Data yang dihapus tidak dapat dipulihkan!',
      icon : "warning",
      buttons:{
        confirm: {
          text : 'Hapus',
          className : 'btn btn-danger'
        },
        cancel: {
          text : 'Tidak',
          visible: true,
          className: 'btn btn-focus'
        }
      }
    }).then((Delete) => {
      if (Delete) {
        swal({
          title: 'Berhasil!',
          text: 'Data berhasil dihapus!',
          icon : "success",
          buttons : {
            confirm: {
              className : 'btn btn-success'
            }
          }
        }).then((Hapus) => {
          if (Hapus) {
            $.ajax({
              method: 'post',
              url: "<?php echo base_url(); ?>admin/hapus_pasar",
              data: {
                  id: id
              },
              dataType: "json",
              success: function(data) {

                location.reload();
                       
              }
            });
          }
        });
      };
    });
  }



  function edit(id){ 
    document.location.href = "<?php echo base_url('admin/editpas_sales/')?>"+id;
  }


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