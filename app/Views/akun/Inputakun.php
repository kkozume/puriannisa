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
        <h1 class="m-0">COA</h1>

      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">COA</li>
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
            <h6 class="card-title font-weight-bold">Tambah Data COA</h6>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->

          <?php
          if (isset($validation)) {
            echo $validation->listErrors();
          }
          ?>

          <!-- form start -->
          <?= form_open('akun') ?>
          <div class="card-body">
            <div class="mb-3">
              <label for="kode_akun">Kode Akun</label>
              <input type="text" class="form-control" id="kode_akun" name="kode_akun" value="<?= set_value('kode_akun') ?>" placeholder="Masukkan kode">
            </div>
            <div class="mb-3">
              <label for="nama_akun">Nama akun</label>
              <input type="text" class="form-control" id="nama_akun" name="nama_akun" value="<?= set_value('nama_akun') ?>" placeholder="Masukkan nama akun">
            </div>
            <div class="mb-3">
              <label for="header_akun">Header Akun</label>
              <input type="text" class="form-control" id="header_akun" name="header_akun" value="<?= set_value('header_akun') ?>" placeholder="Masukkan header akun">
            </div>
            <div class="mb-3">
              <label for="posisi_d_c" class="form-label">Posisi Debet/Kredit</label>
              <select class="form-select" aria-label="Default select example" name="posisi_d_c" value="<? set_value('posisi_d_c') ?>">
                <option disabled>-isi pilihan-</option>
                <option value="debet">Debet</option>
                <option value="kredit">Kredit</option>
              </select>
            </div>


            <!-- /.card-body -->



          </div>
          <!-- /.card -->


          </table>


        </div>


        <div class="row">
          <div class="col-12">
            <a class="btn btn-secondary btn-sm" href="<?= site_url('akun/daftarakun') ?>" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
            <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-paper-plane"></i> Simpan</button>
          </div>
        </div>

        <!-- /col -->
      </div>
      <!-- /col -->
</section>
</form>
<?= $this->endSection() ?>