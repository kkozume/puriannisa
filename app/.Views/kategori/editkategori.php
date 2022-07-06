<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Kategori || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="section">
        <div class="container-fluid">
                <!-- Default box -->
            <div class="card shadow mb-4">
                <div class="card-header">
                <?php if(session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                           <i class="fas fa-check-circle"></i>
                            <?=session()->getFlashdata('success')?>
                        </div>
                    </div>
                <?php endif; ?>
      <?php
        if(isset($validation)){
          echo $validation->listErrors();
        }

        //dapatkan data dari umkm_puri_utami dan simpan ke variabel lokal
        foreach($kategori as $row):
          $kode_kategori = $row->kode_kategori;
          $nama_kategori = $row->nama_kategori;
          $gambar = $row->gambar;
        endforeach;
      ?>
        <div class="row">
        <?= form_open('kategori/editkategoriproses') ?>
            
        <div class="mb-3">
                    <label for="kode_kategori" class="form-label">Kode Kategori</label>
                    <?php
                        //jika set value nama_kategori tidak kosong maka isi $nama_kategori diganti dengan isian dari user
                        if(strlen(set_value('kode_kategori'))>0){
                          $kode_kategori = set_value('kode_kategori');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" value="<?= $kode_kategori?>" placeholder="Diisi dengan kode kategori">
                </div>
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <?php
                        //jika set value nama_kategori tidak kosong maka isi $nama_kategori diganti dengan isian dari user
                        if(strlen(set_value('nama_kategori'))>0){
                          $nama_kategori = set_value('nama_kategori');
                        }
                
                    ?>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $nama_kategori?>" placeholder="Diisi dengan nama kategori">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <?php
                        //jika set value namakosan tidak kosong maka isi $nama diganti dengan isian dari user
                        if(strlen(set_value('gambar'))>0){
                          $nama = set_value('gambar');
                        }
                    ?>
                   <input type="file" class="form-control" id="gambar" name="gambar" value="<?= set_value('gambar')?>" >
                </div> 
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </main>
  </div>
</div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="<?= base_url('dashboard/dashboard.js') ?>"></script>
  </body>
</html>


    <!-- /.container-fluid -->
    </div>
    <!-- /.card -->
</section>
<?= $this->endSection() ?>
