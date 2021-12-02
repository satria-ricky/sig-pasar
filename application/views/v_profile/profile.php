<div class="main-panel">
      <div class="content">
        <div class="panel-header bg-primary-gradient">
          <div class="page-inner py-5">
              
            <div class="page-header text-white">
              <h4 class="page-title text-white">Profile</h4>
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
                  <a href="#" class="text-white">Detail profile</a>
                </li>
              </ul>
            </div>
          </div>
        </div>


<div class="page-inner mt--5">
  <div class="row mt--2">



<!-- ISI KONTEN -->

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?= base_url('assets/foto/user/').$data_pengguna['admin_foto']; ?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <b><h1><?= $data_pengguna['admin_nama'];?></h1></b>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card ">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $data_pengguna['admin_nama'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <b><h6 class="mb-0">Username</h6></b>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $data_pengguna['admin_username'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <b><h6 class="mb-0">Password</h6></b>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $data_pengguna['admin_password'];?>
                    </div>
                  </div>
                
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $data_pengguna['admin_alamat'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="<?= base_url()?>admin/edit_profile">Edit profile</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- ISI KONTEN -->
            
  </div>
</div>
</div>


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