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
      ?>
        <div class="row">
        <?= form_open('produk') ?>
                <div class="mb-3">
                    <label for="kode_produk" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="<?= set_value('kode_produk')?>" placeholder="Diisi dengan kode produk">
                </div>
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= set_value('nama_produk')?>" placeholder="Diisi dengan nama produk">
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?= set_value('stok')?>" placeholder="Diisi dengan stok">
                </div>
                <div class="mb-3">
                    <label for="harga_produk" class="form-label">Harga Produk</label>
                    <input type="text" class="form-control" id="harga_produk" name="harga_produk" value="<?= set_value('harga_produk')?>" placeholder="Diisi dengan harga produk">
                </div>
                  <div class="mb-3">
                    <label for="harga">Harga Produk</label>
                    <?php
                        if(isset($validation)){
                            //untuk mengecek apakah ada error pada elemen field namakosan
                            if ( $validation->hasError('harga') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error: <?=$validation->getError('harga')?> </strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            <?php
                            }
                        }
                    ?>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga')?>" placeholder="Diisi dengan harga produk (cth: 150,000)">
                </div>
                <div class="mb-3">
                    <label for="kode_kategori" class="form-label">Kode Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="id">
                    <?php
                            foreach($kategori as $row):
                              ?>
                                  <option value="<?=$row['kode_kategori']?>"><?=$row['kode_kategori']?></option>
                              <?php
                            endforeach;
                        ?>
                    </select>
                </div>               
                <div class="mb-3">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" value="<?= set_value('gambar') ?>" >
                </div>
                          
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
            // Format mata uang.
            $('#harga_produk').mask('0,000,000,000,000,000,000,000', {reverse: true});         
            
        })
    </script> 

  </body>
</html>

   <!-- /.container-fluid -->
    </div>
    <!-- /.card -->
</section>
<?= $this->endSection() ?>
