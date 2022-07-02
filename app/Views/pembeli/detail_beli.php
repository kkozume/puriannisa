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
        <h1 class="m-0">Transaksi Pembelian</h1>

      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Transaksi Pembelian</li>
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
          <div class="card-header">
            <h6 class="card-title font-weight-bold">Detail Pembelian</h6>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->

          <?php
          if (isset($validation)) {
            echo $validation->listErrors();
          }
          ?>

          <!-- form start -->
        
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('beli/simpan_pembelian')?>" method="POST">
                                
                                <div class="form-group row">
                                    <label for="id_permintaan" class="col-sm-3 col-form-label">ID Permintaan</label> <br>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="id_permintaan" value="<?= $id_permintaan ?>" readonly>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label for="id_pmb" class="col-sm-3 col-form-label">ID Beli</label> <br>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="id_pmb" name="id_pmb" value="<?= $kode ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label> <br>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $tanggal ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="supplier" class="col-sm-3 col-form-label">Supplier</label> <br>
                                    <div class="col-sm-9">
                                        <select name="supplier" id="supplier" class="form-control" required>
                                            <option value="">-</option>
                                            <?php foreach ($supplier as $key => $value) { ?>
                                            <option value="<?= $value->id_supplier?>"><?= $value->nama_suplier?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <hr>
                                <h6>Detail Permintaan Pembelian</h6>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <td>Bahan </td>
                                            <td>Qty</td>
                                            <td>Harga Satuan</td>
                                            <td>Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($detail as $item) { ?> 
                                        <tr>
                                            <td><?= $item->nama_bahanbaku?></td>
                                            <td><?= $item->qty?></td>
                                            <td><?= $item->harga_bb?></td>
                                            <td><?= $item->total?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <hr>
                                <input type="hidden" value="<?= $total_trans ?>" name="total_trans">
                                <?php foreach($detail as $value) { ?>
                                  <input type="hidden" name="id_barang[]" value="<?= $value->id_bahanbaku ?>">
                                  <input type="hidden" name="qty1[]" value="<?= $value->qty ?>">
                                  <input type="hidden" name="harga_bb1[]" value="<?= $value->harga_bb ?>">
                                  <input type="hidden" name="subtot[]" value="<?= $value->qty * $value->harga_bb ?>">
                                <?php } ?>
                                <div class="text-right">
                                    <a href="<?= base_url('beli/ListBeli') ?>" class="btn btn-sm btn-default">Kembali Halaman Utama</a>
                                    <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</section>
</form>
<?= $this->endSection() ?>