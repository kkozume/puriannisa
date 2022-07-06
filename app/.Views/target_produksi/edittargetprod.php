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
          <div class="col-xs-4">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Target Produksi</h3>
              </div>
              <!-- /.card-header -->

        <?php
        if(isset($validation)){
          echo $validation->listErrors();
        }

        //dapatkan data dari umkm_puri_utami dan simpan ke variabel lokal
        foreach($target_produksi as $row):
          $id_target  = $row->id_target;
          $nama_produk = $row->nama_produk;
          $target_produksi  = $row->target_produksi;
          $periode_target   = $row->periode_target;
        endforeach;
      ?>
              <!-- form start -->
              <?= form_open('target_produksi/edittargetproses') ?>
              <input type="hidden" id="id_target" name="id_target" value="<?=$id_target?>">

                <div class="card-body">
                  <div class="form-group">
                  <label for="nama_produk" class="form-label">Nama Produk</label>
                    <?php
                        //jika set value nama_suplier tidak kosong maka isi $nama_suplier diganti dengan isian dari user
                        if(strlen(set_value('nama_produk'))>0){
                          $nama_produk = set_value('nama_produk');
                        }
                
                    ?>
                     <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $nama_produk?>" placeholder="Diisi dengan nama produk">
                  </div>

                  <div class="form-group">
                  <label for="target_produksi" class="form-label">Target Produksi</label>
                    <?php
                        //jika set value nama_cv tidak kosong maka isi $nama_cv diganti dengan isian dari user
                        if(strlen(set_value('target_produksi'))>0){
                          $target_produksi = set_value('target_produksi');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="target_produksi" name="target_produksi" value="<?= $target_produksi?>" placeholder="Diisi dengan target produksi">
                  </div>

              
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
                   
                  </div>

                <!-- /.card-body -->

            <!-- /.card -->

          </tbody>
                </table>
              </div>



              
              <!-- /col -->
          </div>
              <!-- /col -->



              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
              </form>
            </div>
        <!-- date-range-picker -->
        <script src="<?=base_url()?>/template/plugins/daterangepicker/daterangepicker.js"></script>
          </section>
          <?=$this->endSection()?>