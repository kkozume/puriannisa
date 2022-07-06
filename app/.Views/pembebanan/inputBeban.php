<?= $this->extend('layout/default') ?>
<!-- Content Wrapper. Contains page content -->

<?= $this->section('content') ?>
<title>Home || Puri Utami</title>
<? $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Pembayaran Beban</h1>

      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pembayaran Beban</li>
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
          <div class="card-header">
            <h6 class="card-title font-weight-bold">Tambah Pembayaran Beban</h6>
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
        <div class="row">

        <?= form_open('pembebanan/inputBeban') ?> 
                <div class="mb-3">
                    <label for="kodebeban" class="form-label">Kode Akun Beban</label>
                        <select class="form-select" aria-label="Default select example" name="kodebeban">
                            <?php
                                foreach($pembebanan as $row):
                                    $id = $row->id;
                                    $kode_akun = $row->kode_akun;
                                    $nama_akun = $row->nama_akun;
                                    ?>
                                        <option value="<?=$kode_akun?>"><?=$nama_akun?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                </div>
                <div class="mb-3">
                    <label for="nama">Nama Beban</label>
                    <?php
                        if(isset($validation)){
                            //untuk mengecek apakah ada error pada elemen field namakosan
                            if ( $validation->hasError('nama') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error: <?=$validation->getError('nama')?> </strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <?php
                            }
                        }
                    ?>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama')?>" placeholder="Diisi dengan Nama Beban (cth: Listrik Bulan Maret)">
                </div>
                <div class="mb-3">
                    <label for="biaya">Besar Beban</label>
                    <?php
                        if(isset($validation)){
                            //untuk mengecek apakah ada error pada elemen field namakosan
                            if ( $validation->hasError('biaya') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error: <?=$validation->getError('biaya')?> </strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <?php
                            }
                        }
                    ?>
                    <input type="text" class="form-control" id="biaya" name="biaya" value="<?= set_value('biaya')?>" placeholder="Diisi dengan Biaya Beban (cth: 150,000)">
                </div>
                <div class="mb-3">
                    <label for="waktu">Tanggal Beban</label>
                    <?php
                        if(isset($validation)){
                            //untuk mengecek apakah ada error pada elemen field namakosan
                            if ( $validation->hasError('waktu') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error: <?=$validation->getError('waktu')?> </strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <?php
                            }
                        }
                    ?>
                    <input type="date" class="form-control" id="waktu" name="waktu" value="<?= set_value('waktu')?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

     
    </main>
  </div>
</div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="<?= base_url('dashboard/dashboard.js') ?>"></script>

    <script>
		$(document).ready(function(){
			// Format mata uang.
			$('#biaya').mask('0.000.000.000.000.000', {reverse: true});		
			
		})
	 </script>                     


  </body>
</html>

   <!-- /.container-fluid -->
    </div>
    <!-- /.card -->
</section>
<?= $this->endSection() ?>
