<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Penjualan || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penjualan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Penjualan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="section">
        <div class="container-fluid">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= site_url('penjualan/inputJual') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Penjualan</a>
            </div>
            </div>
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
      
                        <form>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Kode Produk</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah</label>
                                    <input id="jumlah_produk" type="number" class="form-control" required onchange="totalHarga()">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input id="harga_produk" type="number" class="form-control" required onchange="totalHarga()">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Total Harga</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input id="total_harga" type="number" class="form-control" required disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <a href="">
            </a> -->
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card-title">
                <h5>Daftar Penjualan</h5>
            </div>
            <hr>
   
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    var hargaProduk;
    var jumlahProduk;
    var hargaTotal;
    var bayarTotal;

    function totalHarga() {
        hargaProduk = document.getElementById('harga_produk').value;
        jumlahProduk = document.getElementById('jumlah_produk').value;
        document.getElementById('total_harga').value = hargaProduk * jumlahProduk;
        hargaTotal = document.getElementById('total_harga').value;
    }

    function totalBayar() {
        var bayarTotal = document.getElementById('total_bayar').value;
        document.getElementById('kembalian').value = bayarTotal - hargaTotal;
    }
</script>



   <!-- /.container-fluid -->
    </div>
    <!-- /.card -->
</section>
<?= $this->endSection() ?>