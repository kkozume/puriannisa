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
            <h1 class="m-0">Bahan </h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bahan </li>
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
                <h3 class="card-title">Tambah Data Bahan</h3>
              </div>
              <!-- /.card-header -->

              <?php
              if(isset($validation)){
              echo $validation->listErrors();
              }
              ?>
              
              <!-- form start -->
              <?= form_open_multipart('bahan_baku/index') ?>
                <div class="card-body">
                <div class="mb-3">
                    <label for="nama_bahanbaku">Nama Bahan </label>
                    <input type="text" class="form-control" id="nama_bahanbaku" name="nama_bahanbaku" value="<?= set_value('nama_bahanbaku')?>" placeholder="Masukkan Nama Bahan Baku">
                  </div>

                <div class="mb-3">
                    <label for="satuan_bb" class="form-label">Satuan</label>
                    <select class="form-select" aria-label="Default select example" name="satuan_bb">
                    <option disabled>Pilihan Satuan</option>
                        <option value="roll">roll</option>
                        <option value="meter">meter</option>
                        <option value="pcs">pcs</option>
                    </select>
                </div>

                  <div class="mb-3">
                    <label for="qty_bb">Qty Bahan</label>
                    <input type="text" class="form-control" id="qty_bb" name="qty_bb" value="<?= set_value('qty_bb')?>" placeholder="Masukkan Qty bb">
                  </div>

                  <div class="mb-3">
                    <label for="harga_bb">Harga Bahan</label>
                    <?php
                        if(isset($validation)){
                            //untuk mengecek apakah ada error pada elemen field nama_produk
                            if ( $validation->hasError('harga_bb') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    
                            <?php
                            }
                        }
                    ?>
                    <input type="text" class="form-control" id="harga_bb" name="harga_bb" value="<?= set_value('harga_bb')?>" placeholder="Masukkan Harga BB">
                  </div>

                  <div class="mb-3">
                    <label for="jenis_bb" class="form-label">Jenis Bahan</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_bb">
                    <option disabled>Jenis bahan </option>
                        <option value="bahanbaku">bahan baku</option>
                        <option value="bahanpenolong">bahan penolong</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="biaya_pesan">Biaya Pesan</label>
                    <?php
                        if(isset($validation)){
                            //untuk mengecek apakah ada error pada elemen field nama_produk
                            if ( $validation->hasError('biaya_pesan') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                   
                            <?php
                            }
                        }
                    ?>
                    <input type="text" class="form-control" id="biaya_pesan" name="biaya_pesan" value="<?= set_value('biaya_pesan')?>" placeholder="Masukkan Biaya Pesan">
                  </div>

                  <div class="mb-3">
                    <label for="biaya_simpan">Biaya Simpan</label>
                    <?php
                        if(isset($validation)){
                            //untuk mengecek apakah ada error pada elemen field nama_produk
                            if ( $validation->hasError('biaya_simpan') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    
                            <?php
                            }
                        }
                    ?>
                    <input type="text" class="form-control" id="biaya_simpan" name="biaya_simpan" value="<?= set_value('biaya_simpan')?>" placeholder="Masukkan Biaya Simpan">
                  </div>

                <!-- /.form group -->
              
              
                <!-- /.card-body -->

            <!-- /.card -->

          </tbody>
                </table>
              </div>



              
              <!-- /col -->
          </div>
          
          <div class="card-row">
          <div class="col-12">
            <a class="btn btn-secondary btn-sm" href="<?= site_url('bahan_baku/daftarbahan') ?>" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
                  <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
                </div>
              </form>
            </div>
              <!-- /col -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
             <script type="text/javascript">
              $(document).ready(function(){
                  // Format mata uang.
                  $('#harga_bb,#biaya_pesan,#biaya_simpan').mask('0,000,000,000,000,000,000,000', {reverse: true});           
                  
              })
           </script>

          </section>
          <?=$this->endSection()?>

          