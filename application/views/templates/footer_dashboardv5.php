


      
  </body>
</html>

<div class="modal modal-dialog modal-lg" id="" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
      <img src="" id="" alt="" class="avatar avatar-xxl rounded" style="width: 200px; height: 230px;" >
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



<!-- LOGIN MODAL -->
<div class="modal fade" id="modal_login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h2 class="fw-bold">Sign in</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5 pt-0">
        <div class="mb-2" style="display: flex;flex-direction: column; justify-content: center;align-items: center; text-align: center;">
          <img src="<?= base_url('assets/foto/pasar/'); ?>default.png" alt="" width="200" height="200">
        </div>
        <form method="post" action="<?= base_url('auth'); ?>/login" id="form_login">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="floatingInput" placeholder="Username" name="username" required="">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password" name="password" required="">
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-100  btn btn-lg rounded-4 btn-primary" type="submit"> <b>Login</b> <i class="fas fa-sign-in"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" id="modal_detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Data Pasar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="card mb-3">
          <img src="" id="foto_detail" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Lihat Rute</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>               
<script src="<?= base_url('assets/dashboard5/'); ?>assets/dist/js/bootstrap.bundle.min.js"></script>

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

<?php if($this->session->flashdata('error')){ ?>
  <script>
    swal("<?php echo $this->session->flashdata('error'); ?>", {
        icon : "error",
        buttons: {                  
            confirm: {
                className : 'btn btn-danger'
            }
        },
    });
  </script>
<?php } ?>

<script type="text/javascript">


  function buton_login(){
    $('#modal_login').modal('show');
  }

  function button_detail(e){
    $('#modal_detail').modal('show');
    // console.log(e);
    $.ajax({
        method: 'get',
        url: "<?php echo base_url(); ?>auth/detail_pasar",
        data: {
            id: e
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

  function button_tambah(){
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
    }).then((Tambah) => {
      if (Tambah) {
        document.getElementById("form_tambah").submit();
        console.log('form_tambah');
      } else {
        swal.close();
      }
    });
  }

  

</script>