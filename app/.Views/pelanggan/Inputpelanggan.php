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
        <h1 class="m-0">Pelanggan</h1>

      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pelanggan</li>
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
            <h6 class="card-title font-weight-bold">Tambah Data Pelanggan</h6>
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
        <?= form_open_multipart('pelanggan') ?>
        <div class="mb-3">
                   <label for="nama_pelanggan" class="form-label">Nama pelanggan</label>
                   <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= set_value('nama_pelanggan')?>" placeholder="Diisi dengan nama pelanggan">
        </div>

                <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                    <option selected>-Jenis Kelamin-</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat')?>" placeholder="Diisi dengan alamat">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= set_value('no_telp')?>" placeholder="Diisi dengan nomor telepon">
                </div>
                
                
                <div class="mb-3">
                    <label for="ktp" class="form-label">KTP pelanggan</label>
                    <input type="file" class="form-control" id="ktp" name="ktp" value="<?= set_value('ktp')?>" placeholder="Diisi dengan ktp">
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
			// Format telepon.
			$('#no_telp').mask('000-000-000-000-000', {reverse: true});			
			
		})
	 </script> 
  

  </body>
</html>

</section>
<?= $this->endSection() ?>
