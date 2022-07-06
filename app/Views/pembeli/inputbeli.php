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
            <h6 class="card-title font-weight-bold">Tambah Transaksi Pembelian</h6>
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
                            <form action="<?= base_url('beli/tambah_pembelian')?>" method="POST">
                                
                                <div class="form-group row">
                                    <label for="id_permintaan" class="col-sm-2 col-form-label">ID Permintaan</label> <br>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="id_permintaan" id="id_permintaan" required>
                                            <option value="">-</option>
                                            <?php foreach ($detail_permintaan as $row) :?>
                                            <option value="<?= $row->id_permintaan ?>"><?= $row->id_permintaan?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label for="id_pmb" class="col-sm-2 col-form-label">ID Beli</label> <br>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_pmb" name="id_pmb" value="<?= $kode ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label> <br>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
                                    </div>
                                </div>
                                
                                <hr>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-sm btn-info">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Detail Pembelian</h3>
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Kode Bahan</th>
                                            <th>Id permintaan</th>
                                        <th>Nama Bahan Baku</th>
                                        <th>Harga Satuan</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                $total = 0;
                                $subtotal = 0;
                                $grandtot = 0;
                                foreach ($list_detail as $item) { ?>
                                    <?php $subtotal += $item->harga_bb * $item->qty; 
                                    $grandtot = $subtotal + $total?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $item->id_bahanbaku?></td>
                                        <td><?= $item->id_permintaan?></td>
                                        <td><?= $item->nama_bahanbaku?></td>
                                        <td><?= $item->harga_bb?></td>
                                        <td><?= $item->qty?></td>
                                        <td><?= $item->harga_bb * $item->qty?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th>Total</th>
                                    <th colspan="6" class="text-right"><?= $grandtot?></th>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <?php if ($detil->getNumRows() != 0) { ?>
                                <form action="<?= base_url('beli/save_pembelian')?>" method="POST">
                                <input type="hidden" name="id" value="<?= $kode ?>">
                                <input type="hidden" name="total" value="<?= $total1 ?>">
                                <div class="form-group row"> <br>
                                    <label for="supplier" class="col-sm-3 col-form-label">Supplier</label> <br>
                                    <div class="col-sm">
                                        <select name="supplier" id="supplier" class="form-control" required>
                                        <option value="">-</option>
                                            <?php foreach ($supplier as $value) { ?>
                                            <option value="<?= $value->id_supplier?>"><?= $value->nama_suplier?></option> <br>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-info btn-sm">Selesai</button>
                                </form>
                            <?php }?>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</main>
</section>
</form>
<?= $this->endSection() ?>