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
        <h1 class="m-0">Supplier</h1>

      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Supplier</li>
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
            <h3 class="card-title">Edit Supplier</h3>
          </div>
          <!-- /.card-header -->

          <?php
          if (isset($validation)) {
            echo $validation->listErrors();
          }

          //dapatkan data dari umkm_puri_utami dan simpan ke variabel lokal
          foreach ($supplier as $row) :
            $id_supplier = $row->id_supplier;
            $tanggal = $row->tanggal;
            $nama_suplier = $row->nama_suplier;
            $nama_cv = $row->nama_cv;
            $alamat_supplier = $row->alamat_supplier;
            $no_telp_supplier = $row->no_telp_supplier;
            $ktp = $row->ktp;
          endforeach;
          ?>
          <!-- form start -->
          <?= form_open_multipart('supplier/editsupplierproses') ?>
          <input type="hidden" id="id_supplier" name="id_supplier" value="<?= $id_supplier ?>">
          <div class="card-body">
            <div class="form-group">


              <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <?php
                //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                if (strlen(set_value('tanggal')) > 0) {
                  $nama_suplier = set_value('tanggal');
                }

                ?>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $tanggal ?>" placeholder="Diisi dengan tanggal">
              </div>


              <div class="form-group">
                <label for="nama_suplier">Nama supplier</label>
                <?php
                //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                if (strlen(set_value('nama_suplier')) > 0) {
                  $nama_suplier = set_value('nama_suplier');
                }

                ?>
                <input type="text" class="form-control" id="nama_suplier" name="nama_suplier" value="<?= $nama_suplier ?>" placeholder="Diisi dengan nama supplier">
              </div>

              <div class="form-group">
                <label for="nama_cv">Nama Toko</label>
                <?php
                //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                if (strlen(set_value('nama_cv')) > 0) {
                  $nama_cv = set_value('nama_cv');
                }

                ?>
                <input type="text" class="form-control" id="nama_cv" name="nama_cv" value="<?= $nama_cv ?>" placeholder="Diisi dengan nama toko">
              </div>

              <div class="form-group">
                <label for="alamat_supplier"> Alamat supplier</label>
                <?php
                //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                if (strlen(set_value('alamat_supplier')) > 0) {
                  $alamat_supplier = set_value('alamat_supplier');
                }

                ?>
                <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" value="<?= $alamat_supplier ?>" placeholder="Diisi dengan alamat supplier">
              </div>

              <div class="form-group">
                <label for="no_telp_supplier">No telp supplier</label>
                <?php
                //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                if (strlen(set_value('no_telp_supplier')) > 0) {
                  $no_telp_supplier = set_value('no_telp_supplier');
                }

                ?>
                <input type="text" class="form-control" id="no_telp_supplier" name="no_telp_supplier" value="<?= $no_telp_supplier ?>" placeholder="Diisi dengan no telp supplier">
              </div>

              <div class="form-group">
                <label for="ktp">KTP</label>
                <input type="file" class="form-control" id="ktp" name="ktp">
                <br>
                <a href="<?php echo base_url('images/upload/' . $ktp) ?>" target="_blank">
                  <img src="<?php echo base_url('images/upload/' . $ktp) ?>" class="img-thumbnail" width="100">
                </a>
              </div>


              <!-- /.card-body -->


              <!-- /.card -->

              </tbody>
              </table>
            </div>




            <!-- /col -->
          </div>
        </div>
          <!-- /col -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
          </form>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
   <script type="text/javascript">
		$(document).ready(function(){
			// Format telepon.
			$('#no_telp_supplier').inputmask('999-999-999-999');			
			
		})
	 </script>


</section>
<?= $this->endSection() ?>