<!-- Sidebar -->
    <div class="sidebar sidebar-style-2">     
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <div class="user">
            <div class="avatar-sm float-left mr-2">
              <img src="<?= base_url('assets/foto/user/').$data_pengguna['admin_foto']; ?>" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
              <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                <span>
                  <?= $data_pengguna['admin_nama'];  ?>
                  <span class="user-level"><?= $data_pengguna['admin_username'];  ?></span>
                  <span class="caret"></span>
                </span>
              </a>
              <div class="clearfix"></div>

              <div class="collapse in" id="collapseExample">
                <ul class="nav">
                  <li>
                    <a href="<?= base_url(); ?>admin">
                      <span class="link-collapse">My Profile</span>
                    </a>
                  </li>
                
                  <li>
                    <a href="<?= base_url(); ?>admin/edit_profile">
                      <span class="link-collapse">Edit Profile</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>


          <ul class="nav nav-primary">

            <li class="nav-item <?= ($title === 'Daftar pasar' || $title === 'Edit pasar' ) ? 'active' : '' ?>">
              <a href="<?= base_url(); ?>admin/daftar_pasar" class="collapsed">
                <i class="fas fa-store"></i>
                <p>Data Pasar</p>
              </a>
            </li>

            

            <hr class="sidebar-divider">

            <li class="nav-item <?= ($title === 'Tambah Data') ? 'active' : '' ?>">
              <a href="<?= base_url(); ?>admin/tambah_data" class="collapsed">
                <i class="fas fa-plus"></i>
                <p>Tambah data pasar</p>
              </a>
            </li>

            <hr class="sidebar-divider">
            

              <li class="nav-item">
                <a onclick="logout()" class="btn btn-danger" style="cursor: pointer;">
                  <i class="fas fa-arrow-alt-circle-left text-white"></i>
                  <p class="text-white">Logout</p>
                </a>
              </li>
            


          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->