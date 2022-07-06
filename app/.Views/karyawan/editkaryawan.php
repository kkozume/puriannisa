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
          <div class="col-xs-4">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Edit Karyawan</h3>
              </div>
              <!-- /.card-header -->

              <?php
        if(isset($validation)){
          echo $validation->listErrors();
        }

        //dapatkan data dari umkm_puri_utami dan simpan ke variabel lokal
        foreach($karyawan as $row):
        $id_karyawan     = $row->id_karyawan;
		$nama_karyawan   = $row->nama_karyawan;
        $tgl_lahir       = $row->tgl_lahir;
        $jenis_kelamin   = $row->jenis_kelamin;       
        $no_telp         = $row->no_telp;
		$alamat          = $row->alamat;
		$jabatan         = $row->jabatan;
        $gambar          = $row->gambar;
        endforeach;
      ?>
              <!-- form start -->
              <?= form_open('karyawan/editkaryawanproses') ?>
              <input type="hidden" id="id_karyawan" name="id_karyawan" value="<?= $id_karyawan?>">
                <div class="card-body">
                  <div class="form-group">
                 

				<div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <?php
                        //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                        if(strlen(set_value('nama_karyawan'))>0){
                          $nama_karyawan = set_value('nama_karyawan');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?= $nama_karyawan?>" placeholder="Diisi dengan nama karyawan">
                  </div>
				  
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <?php
                        //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                        if(strlen(set_value('tgl_lahir'))>0){
                          $nama_karyawan = set_value('tgl_lahir');
                        }
                
                    ?>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $tgl_lahir?>" placeholder="Diisi dengan tanggal">
                  </div>


                  

                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <?php
                        //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                        if(strlen(set_value('jenis_kelamin'))>0){
                          $jenis_kelamin = set_value('jenis_kelamin');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $jenis_kelamin?>" placeholder="Diisi dengan jenis_kelamin">
                  </div>  

                  <
                  <div class="form-group">
                    <label for="no_telp">No telepon</label>
                    <?php
                        //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                        if(strlen(set_value('no_telp'))>0){
                          $no_telp = set_value('no_telp');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $no_telp?>" placeholder="Diisi dengan no telp ">
                  </div> 
				  
				  <div class="form-group">
                    <label for="alamat"> Alamat </label>
                    <?php
                        //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                        if(strlen(set_value('alamat'))>0){
                          $alamat = set_value('alamat');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat?>" placeholder="Diisi dengan alamat ">
                  </div>
                  
				  <div class="form-group">
                    <label for="jabatan"> Jabatan</label>
                    <?php
                        //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                        if(strlen(set_value('jabatan'))>0){
                          $jabatan = set_value('jabatan');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $jabatan?>" placeholder="Diisi dengan jabatan">
                  </div>
                  

                  <div class="form-group">
                    <label for="gambar">KTP</label>
                    <input type="file" class="form-control" id="gambar" name="gambar"  >
                    <br>
                    <a href="<?php echo base_url('images/upload/'.$gambar) ?>" target="_blank">
                    <img src="<?php echo base_url('images/upload/'.$gambar) ?>" class="img-thumbnail" width="100">
                    </a>
                </div>
                 
              
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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