<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Transaksi Pembelian || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Transaksi Pembelian</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
          <li class="breadcrumb-item active">Transaksi Pembelian</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="section">
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="<?= site_url('beli/inputbeli') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Data Pembelian</a>
      </div>
    </div>
    <div class="card shadow mb-4">
      <!-- DataTales Example -->
      <div class="card-header py-3">
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">x</button>
              <i class="fas fa-check-circle"></i>
              <?= session()->getFlashdata('success') ?>
            </div>
          </div>
        <?php endif; ?>
        <h3 class=" card-title m-0 font-weight-bold">Data Transaksi Pembelian</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
            <thead>
              <tr>
              <th>ID Pembelian</th>
              <th>Tanggal</th>
              <th>Supplier</th>
              <th>Total Transaksi</th>
              </tr>
            </thead>
            <tbody>
           
            <?php foreach ($pembeli as $key => $value) { ?>
              <tr>
                <td><?= $value->id_pembelian?></td>
                <td><?= $value->tanggal?></td>
                <td><?= $value->nama_suplier?></td>
                <td class="text-right"><?= rupiah($value->total)?></td>
              </tr>
            <?php } ?>
        
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
  </div>

  <!-- timeline -->

  

</section>
<?= $this->endSection() ?>