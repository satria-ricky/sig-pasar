

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
<div class="container">

 <div class="card ">


            <div class="card-header py-3">
            <h4 class="font-weight-bold"> Total Lapangan</h4>  
            </div>
         

<div class="row" id="data_beranda">

            
</div>
 </div>

<!-- Earnings (Monthly) Card Example -->
            
          
</div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">
getData();

function getData(){
  $.ajax({
      type: "POST",
      url: "<?= base_url('c_bulu_tangkis/load_verif'); ?>",
      dataType : "JSON",
      success: function(response){
        // console.log(response);
        $('#data_beranda').html(response);
      }
    
    });
}


function lapangan() {
  // console.log("masjid");
  window.location.href="<?= base_url(); ?>c_bulu_tangkis/daftar";
}

</script>