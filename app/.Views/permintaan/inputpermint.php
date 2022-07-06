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
        <h1 class="m-0">Permintaan Pembelian</h1>

      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Permintaan Pembelian</li>
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
            <h6 class="card-title font-weight-bold">Tambah Permintaan Pembelian</h6>
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
                            <form action="<?= base_url('c_permintaan/detail_pmb')?>" method="POST">
                                
                          
                                <div class="form-group row">
                                    <label for="id_prm" class="col-sm-2 col-form-label">ID Permintaan</label> <br>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_prm" name="id_prm" value="<?= $kode ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_permintaan" class="col-sm-2 col-form-label">Tanggal</label> <br>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="tgl_permintaan" name="tgl_permintaan" value="<?= date('Y-m-d')?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="produk" class="col-sm-2 col-form-label">Bahan </label> <br>
                                    <div class="col-sm-8">
                                        <select name="produk" id="produk" class="form-control" required>
                                            <option value="">-</option>
                                            <?php foreach ($bahan_baku as $key => $value) { ?>
                                            <option value="<?= $value->id_bahanbaku?>"><?= $value->nama_bahanbaku?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="qty" id="qty" min="1" value="1">
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
                <div class="col-sm-6">
                    <!-- <div class="table-responsive"> -->
                        <div class="card">
                            <div class="card-body">
                                <h3>Detail Permintaan</h3>
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id permintaan</th>
                                            <th>Nama Bahan </th>
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
                                    <form action="<?= base_url('c_permintaan/save_pembelian')?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $kode ?>">
                                    <input type="hidden" name="total" value="<?= $total1 ?>">
                             
                                    <hr>
                                    <!-- <a href="" class="btn btn-info">Selesai</a> -->
                                    <button type="submit" class="btn btn-info btn-sm">Selesai</button>
                                    </form>
                                <?php }?>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</main>
</section>
</form>
<?= $this->endSection() ?>