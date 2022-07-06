<?=$this->extend('layout/default')?>
<!-- Content Wrapper. Contains page content -->

<?= $this->section('content')?>
<title>Home || Puri Utami</title>
<?$this->endSection()?>

<?= $this->section('content')?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Target Produksi</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Target Produksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <!-- <div class="col-md-6"> -->
          <div class="col-xs-4">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header" >
                <h6 class="card-title font-weight-bold">Tambah Data Target Produksi</h6>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              </div>
              <!-- /.card-header -->

              <?php
              if(isset($validation)){
              echo $validation->listErrors();
              }
              ?>
              
              <!-- form start -->
              <?= form_open('target_produksi') ?>
              <div class="card-body">
              <div class="mb-3">
                    <label for="id_target">Id Target</label>
                    <input type="text" class="form-control" id="id_target" name="id_target" value="<?= isset($_SESSION['id_target']) ? $_SESSION['$id_target']:''; ?>" readonly>
              </div>
              <div class="mb-3">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= set_value('nama_produk')?>" placeholder="Masukkan Nama Produk">
              </div>
                  <div class="mb-3">
                    <label for="target_produksi">Target Produksi</label>
                    <input type="text" class="form-control" id="target_produksi" name="target_produksi" value="<?= set_value('target_produksi')?>" placeholder="Masukkan target_produksi">
                  </div>
                <!-- /.form group -->
                <!-- Date range -->
                <div class="form-group">
                  <label>Periode Target:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="periode_target" name="periode_target" value="<?= set_value('periode_target')?>" >
                  </div>
                <!-- /.card-body -->

             
           
            </div>
            <!-- /.card -->

          
              </table>

              </div>
              
              
             
              
              <!-- /col -->
          </div>
              <!-- /col -->

              <div class="row">
              <div class="col-12">
               <a class="btn btn-secondary btn-sm" href="<?=site_url('target_produksi/daftartargetprod')?>" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
              <button class="btn btn-sm btn-success" type="submit" ><i class="fas fa-paper-plane"></i> Simpan</button>
              </div>
              </div>
          </section>
          </form>
          <?=$this->endSection()?>

          <!-- date-range-picker -->
<script src="<?=base_url()?>/template/plugins/daterangepicker/daterangepicker.js"></script>

          <script>
            
   //Date range as a button
   $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

          </script>