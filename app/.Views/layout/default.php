
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url('images/icon.png') ?>" type="image/gif" sizes="16x16">
  <?= $this->renderSection('title') ?>

  <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/summernote/summernote-bs4.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url()?>/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url()?>/template/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/template/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('home/index.php') ?>" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline"action="" method="post">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" name="keyword" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit" name="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link has-icon text-danger" href="<?= site_url('login') ?>" data-toggle="modal" data-target="#logoutModal" role="button">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <!-- <a class="nav-link has-icon text-danger" href="< echo site_url('home/log_out')>" role="button">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a> -->
      </li>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- /.modal Logout -->
    <div class="modal fade" id="logoutModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Apakah anda yakin ingin keluar?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div> -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a class="btn btn-danger" href="<?= site_url('login/index') ?>" role="button">Logout</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
  <!-- /.modal -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <?= $this->include('layout/menu') ?>
    </aside>
    <!-- /.Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
         <?= $this->renderSection('content') ?>
    </div>
    <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url()?>/template/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>/template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>/template/plugins/sparklines/sparkline.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>/template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url()?>/template/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url()?>/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url()?>/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/template/dist/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url()?>/template/plugins/moment/moment.min.js"></script>
<script src="<?= base_url()?>/template/plugins/inputmask/jquery.inputmask.min.js"></script>    
<!-- Jquery masking -->
<script src="<?= base_url()?>/jquery/jquery.mask.js"></script>
<script src="<?= base_url()?>/jquery/jquery.mask.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url()?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url()?>/template/plugins/toastr/toastr.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    } );
  </script>

  <script>
            /* Dengan Rupiah */
            var biaya = document.getElementById('biaya');
            biaya.addEventListener('keyup', function(e)
            {
                biaya.value = formatRupiah(this.value, 'Rp. ');
            });
	</script> 
  <script>
                // * Tanpa Rupiah *
            // var biaya = document.getElementById('biaya');
            // biaya.addEventListener('keyup', function(e)
            // {
            //    biaya.value = formatRupiah(this.value);
            // });
            
            /* Dengan Rupiah */
            var harga_jual_produk = document.getElementById('harga_jual_produk');
            harga_jual_produk.addEventListener('keyup', function(e)
            {
                harga_jual_produk.value = formatRupiah(this.value, 'Rp. ');
            });
            
            /* Fungsi */
            function formatRupiah(angka, prefix)
            {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split    = number_string.split(','),
                    sisa     = split[0].length % 3,
                    rupiah     = split[0].substr(0, sisa),
                    ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                    
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
	 </script> 
   
     <!-- untuk jquery AJAX -->
  <!-- <script>
    $(document).ready(function(){
        // Format mata uang.
        $('#harga_jual_produk').mask('9.999.999.999.999.999.999.999', {reverse: true});         
        
    })
  </script>  -->
  <script>
    $(document).ready(function(){
        // Format mata uang.
        $('#no_telp').mask('000-000-000-000', {reverse: true});         
        
    })
  </script> 

 <!-- untuk jquery AJAX -->
     <script>
            $(document).ready(function() {
                $('#tahun').change(function(){
                var tahun = document.getElementById("tahun").value;
                //jadinya akses json ke alamat url http://localhost:8080/laporan/listbulan/2021
                var var_url = "<?=base_url('laporan/listbulan')?>"+"/"+tahun; 
                $.ajax({
                    url: var_url,
                    dataType: "json",
                    async : true,
                    success: function(data){
                    try{  
                        var teks = '<div class="mb-3">';
                        teks += '<label for="bulan" class="form-label">Bulan</label>';
                        teks += '<select class="form-select" aria-label="Default select example" name="bulan" id="bulan">';
                        for(i=0; i<data.length; i++){
                            teks += "<option value='"+data[i].bulan_angka+"'>"+data[i].bulan+"</option>";
                        }
                        teks = teks + "</div>";
                        document.getElementById("x").innerHTML = teks;
                    }catch(e) {  
                        alert('Exception while request..');
                    }   
                    }
                });
                });
            });
    </script>
     <!-- akhir jquery AJAX -->   
     <!--  -->
      <!--===============================================================================================-->
</body>
</html>
