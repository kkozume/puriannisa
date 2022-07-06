<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>List || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Safety Stock</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
          <li class="breadcrumb-item active">Safety Stock</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="section">
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="<?= site_url('safety_stock') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Data Safety</a>
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
        <h3 class=" card-title m-0 font-weight-bold">Data Safety</h3>
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
                <th>#id_safety</th>
                <th>tgl_safety</th>
                <th>id_bahanbaku</th>
                <th>pemakaian_max</th>
                <th>pemakaian_min</th>
                <th>lead_time</th>
                <th>safety_stock</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($safety_stock as $row) :
              ?>
                <tr>
                  <td><?= $row['id_safety']; ?></td>
                  <td><?= $row['tgl_safety']; ?></td>
                  <td><?= $row['id_bahanbaku']; ?></td>
                  <td class="text-center"><?= $row['pemakaian_max']; ?></td>
                  <td class="text-center"><?= $row['pemakaian_min']; ?></td>
                  <td class="text-center"><?= $row['lead_time']; ?></td>
                  <td class="text-center"><?= $row['safety_stock']; ?></td>

                  <td>
                    <a class="btn btn-sm btn-info" href="<?= base_url('safety_stock/editsafety/' . $row['id_safety']) ?>" role="button">
                      <i class="fas fa-edit"></i>Ubah
                    </a>

                  </td>
                </tr>
              <?php
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
  </div>
</section>
<?= $this->endSection() ?>