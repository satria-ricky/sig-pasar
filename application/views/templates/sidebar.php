

    <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
        <i class="fab fa-phoenix-framework"></i>
        </div>
        <div class="sidebar-brand-text mx-1">BULU TANGKIS - KOTA MATARAM </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <!-- Nav Item - Charts -->
      
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>c_profile">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>c_bulu_tangkis/beranda">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>c_bulu_tangkis/daftar">
        <i class="fas fa-fw fa-list"></i>
          <span>Daftar lapangan </span></a>
      </li>


      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>c_bulu_tangkis/tambah">
        <i class="fas fa-fw fa-plus"></i>
          <span>Tambah lapangan </span></a>
      </li>

       <hr class="sidebar-divider" >
      
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

