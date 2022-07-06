<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>COA || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Reorder Point</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
          <li class="breadcrumb-item active">Reorder Point</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="section">
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="<?= site_url('reorder_point') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Data Reorder Point</a>
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
        <h3 class=" card-title m-0 font-weight-bold">Data Reorder Point</h3>
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
                <th>#id_reorder</th>
                <th>tgl_reorder</th>
                <th>id_bahanbaku</th>
                <th>pemakaian_rata</th>
                <th>lead_time</th>
                <th>safety_stock</th>
                <th>reorder_point</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($reorder_point as $row) :
              ?>
                <tr>
                  <td><?= $row['id_reorder']; ?></td>
                  <td><?= $row['tgl_reorder']; ?></td>
                  <td><?= $row['id_bahanbaku']; ?></td>
                  <td><?= $row['pemakaian_rata']; ?></td>
                  <td><?= $row['lead_time']; ?></td>
                  <td><?= $row['safety_stock']; ?></td>
                  <td><?= $row['reorder_point']; ?></td>

                  <td>
                    <a class="btn btn-sm btn-info" href="<?= base_url('reorder_point/editreorder/' . $row['id_reorder']) ?>" role="button">
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