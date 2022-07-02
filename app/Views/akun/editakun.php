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
          <div class="col-xs-4">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit COA</h3>
              </div>
              <!-- /.card-header -->

              <?php
        if(isset($validation)){
          echo $validation->listErrors();
        }

        //dapatkan data dari umkm_puri_utami dan simpan ke variabel lokal
        foreach($akun as $row):
          $id = $row->id;
          $kode_akun = $row->kode_akun;
          $nama_akun = $row->nama_akun;
          $header_akun   = $row->header_akun;
          $posisi_d_c = $row->posisi_d_c;
        endforeach;
      ?>
              <!-- form start -->
              <?= form_open('akun/editakunproses') ?>
              <input type="hidden" id="id" name="id" value="<?=$id?>">
                <div class="card-body">

                  <div class="form-group">
                    <label for="kode_akun">Kode Akun</label>
                    <?php
                        //jika set value kode_akun tidak kosong maka isi $kode_akun diganti dengan isian dari user
                        if(strlen(set_value('kode_akun'))>0){
                          $kode_akun = set_value('kode_akun');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="kode_akun" name="kode_akun" value="<?= $kode_akun?>" placeholder="Diisi dengan kode akun">
                  </div>
                  <div class="form-group">
                    <label for="nama_akun">Nama Akun</label>
                    <?php
                        //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                        if(strlen(set_value('nama_akun'))>0){
                          $nama_akun = set_value('nama_akun');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="nama_akun" name="nama_akun" value="<?= $nama_akun?>" placeholder="Diisi dengan nama akun">
                  </div>
                  <div class="form-group">
                    <label for="header_akun">Header Akun</label>
                    <?php
                        //jika set value nama_akun tidak kosong maka isi $nama_akun diganti dengan isian dari user
                        if(strlen(set_value('header_akun'))>0){
                          $nama_akun = set_value('header_akun');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="header_akun" name="header_akun" value="<?= $header_akun?>" placeholder="Diisi dengan header akun">
                  </div>   
                  <div class="mb-3">
                <label for="posisi_d_c" class="form-label">Posisi Debet/Kredit</label>
                    <select class="form-select" aria-label="Default select example" name="posisi_d_c" >
                    <?php
                            $lk = ""; $pr = "";
                            //jika set value posisi_dr_cr tidak kosong maka isi $posisi_dr_cr diganti dengan isian dari user
                            if(strlen(set_value('posisi_d_c'))>0){
                              $posisi_d_c = set_value('posisi_d_c');
                            }
                              echo set_value('posisi_d_c');
                            $debet=""; $kredit = "";
                            if($posisi_d_c=='debet'){$lk="selected";}
                            elseif($posisi_d_c=='kredit'){$pr="selected";}
                        ?>
                        <option disabled>-isi pilihan-</option>
                        <option value="debet" value="<?$debet?>" <?=$lk?>>Debet</option>
                        <option value="kredit" value="<?$kredit?>" <?=$pr?>>Kredit</option>
                    </select>
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
          </section>
          <?=$this->endSection()?>