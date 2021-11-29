

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h3 class="ml-2 mb-3 font-weight-bold ">Profile</h3> -->
          <?= $this->session->flashdata('pesan'); ?>
<?php $data_pengguna; ?>


<div class="card mb-3" >
          <div class="row ml-2 mt-2 ">
            <div class="col-md-4 mt-4">
              <img src="<?= base_url('assets/foto/admin/').$data_pengguna['admin_foto']; ?>" width="100" class="card-img" style="width: 15rem;">    
            </div>
            <div class="col-md-8 ">


            <?= form_open_multipart('c_profile'); ?>
            
            <div class="form-group row mt-1">
              <label for="basic-url" class="col-sm-2 col-form-label mt-1" >Username</label>
                <div class="col-sm-9 mt-1" >
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="username" value="<?= $data_pengguna['admin_username']; ?>" >
                  <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            

            <div class="form-group row mt-1">
              <label for="basic-url" class="col-sm-2 col-form-label mt-1" >Password</label>
                <div class="col-sm-9 mt-1" >
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="password" value="<?= $data_pengguna['admin_password']; ?>">
                  <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <hr>
            <div class="form-group row mt-3">
              <label for="basic-url" class="col-sm-2 col-form-label mt-2" >Nama</label>
                <div class="col-sm-9 mt-2" >
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="nama" value="<?= $data_pengguna['admin_nama']; ?>">
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row mt-3">
              <label for="basic-url" class="col-sm-2 col-form-label mt-2" >Alamat</label>
                <div class="col-sm-9 mt-2" >
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="alamat" value="<?= $data_pengguna['admin_alamat']; ?>">
                  <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row mt-2">
              <div class="row">
                <div class="col-6 mt-2 ml-4">
                    <input type="file" accept="image/*" class="custom-file-input " id="foto" name="foto">
                    <label class="custom-file-label" for="customFile">Ganti foto ?</label>
                </div>
                <div class="col">
                  

                </div> 
              </div>
            </div>

       
          <button class="row float-right mr-2 mt-2 mb-3 btn btn-primary" onclick="return confirm('Yakin ingin diubah?');"><i class="fa fa-edit "></i> Ubah profile </button>
          <?= form_close(); ?>
              
              
            </div>
          </div>
           
</div>










        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

