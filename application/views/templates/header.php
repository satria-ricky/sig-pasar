<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?= $title;?></title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="<?= base_url('assets/'); ?>img/icon.ico" type="image/x-icon"/>
  
  <!-- Fonts and icons -->
  <script src="<?= base_url('assets/'); ?>js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {"families":["Lato:300,400,700,900"]},
      custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url('assets/'); ?>css/fonts.min.css']},
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>

      <link rel="stylesheet" href="<?= base_url() ?>leaflet-locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="<?= base_url() ?>leaflet-locatecontrol/src/L.Control.Locate.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>leaflet-search/src/leaflet-search.css" />
    <script src="<?= base_url() ?>leaflet-search/src/leaflet-search.js"></script>



  <!-- CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/atlantis.min.css">

  
</head>
