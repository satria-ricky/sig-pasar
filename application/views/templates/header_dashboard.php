
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/foto/pasar/'); ?>default.png">
    <?= $title; ?>
    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>

  <link rel="stylesheet" href="<?= base_url() ?>leaflet-locatecontrol/dist/L.Control.Locate.min.css" />
<script src="<?= base_url() ?>leaflet-locatecontrol/src/L.Control.Locate.js"></script>

<link rel="stylesheet" href="<?= base_url() ?>leaflet-search/src/leaflet-search.css" />
<script src="<?= base_url() ?>leaflet-search/src/leaflet-search.js"></script>


    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/dashboard/'); ?>dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="<?= base_url('assets/'); ?>js/plugin/webfont/webfont.min.js"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      
    </style>

    <!-- Custom styles for this template -->
   
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/atlantis.min.css">
    <link href="<?= base_url('assets/dashboard/'); ?>carousel.css" rel="stylesheet">
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
  </head>
  <body>
    
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container"> 
        <a class="navbar-brand font-weight-bolder page-scroll" href="#"> SIG | PASAR TRADISIONAL </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto" >
           
            <li class="nav-item dropdown no-arrow ">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                 <!-- <i class="fas fa-cog ml-2"></i>  -->
                 Aksi
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?= $opsi; ?>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-capitalize" href="<?= base_url(); ?>auth">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw"></i> Login
                </a>
              </div>
            </li>

          </div>
        </div>
      </div>
    </nav>
</header>