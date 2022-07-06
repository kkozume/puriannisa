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
            <h1 class="m-0">Bahan Baku</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bahan Baku</li>
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
                <h3 class="card-title">Edit Bahan Baku </h3>
              </div>
              <!-- /.card-header -->

        <?php
        if(isset($validation)){
          echo $validation->listErrors();
        }

        //dapatkan data dari umkm_puri_utami dan simpan ke variabel lokal
        foreach($bahan_baku as $row):
          $id_bahanbaku = $row->id_bahanbaku;
          $nama_bahanbaku = $row->nama_bahanbaku;
          $satuan_bb = $row->satuan_bb;
          $qty_bb = $row->qty_bb;
          $harga_bb = $row->harga_bb;
          $jenis_bb = $row->jenis_bb;
          $biaya_pesan = $row->biaya_pesan;
          $biaya_simpan = $row->biaya_simpan;
        endforeach;
      ?>
              <!-- form start -->
              <?= form_open_multipart('bahan_baku/editbahanproses') ?>
              <input type="hidden" id="id_bahanbaku" name="id_bahanbaku" value="<?=$id_bahanbaku?>">

                <div class="card-body">
                  <div class="form-group">
                  <label for="nama_bahanbaku" class="form-label">Nama Bahan Baku</label>
                    <?php
                        //jika set value nama_suplier tidak kosong maka isi $nama_suplier diganti dengan isian dari user
                        if(strlen(set_value('nama_bahanbaku'))>0){
                          $nama_bahanbaku = set_value('nama_bahanbaku');
                        }
                
                    ?>
                     <input type="text" class="form-control" id="nama_bahanbaku" name="nama_bahanbaku" value="<?= $nama_bahanbaku?>" placeholder="Diisi dengan nama bahanbaku">
                  </div>

                  <div class="form-group">
                  <label for="satuan_bb" class="form-label">Satuan</label>
                  <select class="form-select" aria-label="Default select example" name="satuan_bb">
                  <?php
                            $lk = ""; $pr = ""; $ss = "";
                            //jika set value posisi_dr_cr tidak kosong maka isi $posisi_dr_cr diganti dengan isian dari user
                            if(strlen(set_value('satuan_bb'))>0){
                              $satuan_bb = set_value('satuan_bb');
                            }
                              echo set_value('satuan_bb');
                            $roll=""; $meter = ""; $pcs ="";
                            if($satuan_bb=='roll'){$lk="selected";}
                            elseif($satuan_bb=='meter'){$pr="selected";}
                            if($satuan_bb=='pcs'){$ss="selected";}
                        ?>
                        <option disabled>-isi pilihan-</option>
                        <option value="roll" value="<?$roll?>" <?=$lk?>>roll</option>
                        <option value="meter" value="<?$meter?>" <?=$pr?>>meter</option>
                        <option value="pcs" value="<?$pcs?>" <?=$ss?>>pcs</option>
                    </select>

                  </div>

                  <div class="form-group">
                  <label for="qty_bb" class="form-label">QTY </label>
                    <?php
                        //jika set value alamat_supplier tidak kosong maka isi $alamat_supplier diganti dengan isian dari user
                        if(strlen(set_value('qty_bb'))>0){
                          $qty_bb = set_value('qty_bb');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="qty_bb" name="qty_bb" value="<?= $qty_bb?>" placeholder="Diisi dengan quantity">
                  </div> 
                  
                  
                  <div class="mb-3">
                    <label for="harga_bb" class="form-label">Harga Bahan</label>
                    <?php
                        //jika set value no_telp_supplier tidak kosong maka isi $no_telp_supplier diganti dengan isian dari user
                        if(strlen(set_value('harga_bb'))>0){
                          $harga_bb = set_value('harga_bb');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="harga_bb" name="harga_bb" value="<?= $harga_bb?>" placeholder="Diisi dengan harga bb ">
                </div>

                <div class="mb-3">
                    <label for="jenis_bb" class="form-label">Jenis Bahan</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_bb">
                    <?php
                            $lk = ""; $pr = ""; 
                            //jika set value posisi_dr_cr tidak kosong maka isi $posisi_dr_cr diganti dengan isian dari user
                            if(strlen(set_value('jenis_bb'))>0){
                              $jenis_bb = set_value('jenis_bb');
                            }
                              echo set_value('jenis_bb');
                            $bahanbaku=""; $bahanpenolong = ""; 
                            if($jenis_bb=='bahan baku'){$lk="selected";}
                            elseif($jenis_bb=='bahan penolong'){$pr="selected";}
                          
                        ?>
                        <option disabled>-isi pilihan-</option>
                        <option value="bahan baku" value="<?$bahanbaku?>" <?=$lk?>>bahan baku</option>
                        <option value="bahan penolong" value="<?$bahanpenolong?>" <?=$pr?>>bahan penolong</option>
                        
                    </select>

                </div>

                <div class="mb-3">
                    <label for="biaya_pesan" class="form-label">Biaya Pesan</label>
                    <?php
                        //jika set value no_telp_supplier tidak kosong maka isi $no_telp_supplier diganti dengan isian dari user
                        if(strlen(set_value('biaya_pesan'))>0){
                          $jenis_bb = set_value('biaya_pesan');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="biaya_pesan" name="biaya_pesan" value="<?= $biaya_pesan?>" placeholder="Diisi dengan biaya pesan ">
                </div>

                
                <div class="mb-3">
                    <label for="biaya_simpan" class="form-label">Biaya Simpan</label>
                    <?php
                        //jika set value no_telp_supplier tidak kosong maka isi $no_telp_supplier diganti dengan isian dari user
                        if(strlen(set_value('biaya_simpan'))>0){
                          $jenis_bb = set_value('biaya_simpan');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="biaya_simpan" name="biaya_simpan" value="<?= $biaya_simpan?>" placeholder="Diisi dengan biaya simpan ">
                </div>
                 
              
                <!-- /.card-body -->

              
            <!-- /.card -->

          </tbody>
                </table>
              </div>



              
              <!-- /col -->
          </div>

          <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
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