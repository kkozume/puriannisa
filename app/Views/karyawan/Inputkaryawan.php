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
            <h1 class="m-0">Karyawan</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Karyawan</li>
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
            <div class="card card-secondary">
              <div class="card-header" >
                <h3 class="card-title">Input Data Karyawan</h3>
              </div>
              <!-- /.card-header -->

              <?php
              if(isset($validation)){
              echo $validation->listErrors();
              }
              ?>
              
              <!-- form start -->
              <?= form_open_multipart('karyawan/index') ?>
                <div class="card-body">
                <div class="mb-3">
                    <label for="nama_karyawan" class="form-label">Nama  Karyawan</label>
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?= set_value('nama_karyawan')?>" placeholder="Diisi dengan nama karyawan">
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir')?>" placeholder="Diisi dengan nama toko">
                </div>
                
				<div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                    <option selected>Jenis Kelamin</option>
                        <option value="perempuan">Perempuan</option>
                        <option value="pria">Pria</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= set_value('no_telp')?>" placeholder="Diisi dengan Nomor Telepon (082144067745)">
                </div>
				<div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat')?>" placeholder="Diisi dengan Alamat">
                </div>
				<div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= set_value('jabatan')?>" placeholder="Diisi dengan jabatan)">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">KTP</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" value="<?= set_value('gambar')?>" >
                </div>
                <!-- /.form group -->
              
              
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </tbody>
                </table>
              </div>



              
              <!-- /col -->
          </div>
              <!-- /col -->
          </section>
          <?=$this->endSection()?>

          