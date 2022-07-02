<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Produk || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <?php
        if(isset($validation)){
          echo $validation->listErrors();
        }

        //dapatkan data dari database untuk tabel form_input
        foreach($produk as $row):
            $kode_produk    = $row->kode_produk;
            $nama_produk    = $row->nama_produk;
            $stok           = $row->stok;
            $harga   = $row->harga;
            $gambar         = $row->gambar;
            $kode_kategori  = $row->kode_kategori;
        endforeach;
      ?>
        <div class="row">
        <?= form_open_multipart('produk/editprodukproses') ?>
            <div class="mb-3">
                    <label for="kode_produk" class="form-label">Kode Produk</label>
                    <?php
                        //jika set value kode_produk tidak kosong maka isi $kode_produk diganti dengan isian dari user
                        if(strlen(set_value('kode_produk'))>0){
                          $kode_produk = set_value('kode_produk');
                        }
                    ?>
                    <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="<?= $kode_produk?>" >
                </div>
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <?php
                        //jika set value nama_produk tidak kosong maka isi $kode_produk diganti dengan isian dari user
                        if(strlen(set_value('nama_produk'))>0){
                          $kode_produk = set_value('nama_produk');
                        }
                    ?>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?=$nama_produk?>" >
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="<?=$stok?>" placeholder="Diisi dengan stok">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Produk</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?=$harga?>" >
                </div>
                <div class="mb-3">
                    <label for="kode_kategori" class="form-label">Kode Kategori</label>
                    <?php
                        //jika set value kode_kategori tidak kosong maka isi $kode_produk diganti dengan isian dari user
                        if(strlen(set_value('kode_kategori'))>0){
                          $kode_produk = set_value('kode_kategori');
                        }
                    ?>
                     <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" value="<?=$kode_kategori?>" >
                    </div>
                
                <div class="mb-3">
                    <label for="gambar">Gambar</label>
                    <?php
                        //jika set value gambar tidak kosong maka isi $kode_produk diganti dengan isian dari user
                        if(strlen(set_value('gambar'))>0){
                          $kode_produk = set_value('gambar');
                        }
                    ?>
                    <input type="file" class="form-control" id="gambar" name="gambar" value="<?= set_value('gambar') ?>" >
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
