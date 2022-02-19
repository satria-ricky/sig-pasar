


      
  </body>
</html>

<div class="modal modal-dialog modal-lg" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
        <form method="post" action="<?= base_url('auth'); ?>/login">
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


<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>               
<script src="<?= base_url('assets/dashboard5/'); ?>assets/dist/js/bootstrap.bundle.min.js"></script>

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

<?php if($this->session->flashdata('logout')){ ?>
  <script>
    swal("<?php echo $this->session->flashdata('logout'); ?>", {
        icon : "success",
        buttons: {                  
            confirm: {
                className : 'btn btn-success'
            }
        },
    });
  </script>
<?php } ?>

<script type="text/javascript">
  function login(){
    $('#modal_login').modal('show');
  }
</script>