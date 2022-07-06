<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>TargetProduksi|| UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Target Produksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Target Produksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="section">
 <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="<?= site_url('target_produksi') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Data Target Produksi</a>
      </div>
    </div>
 <div class="card shadow mb-4">
      <!-- DataTales Example -->
      <div class="card-header py-3">
                <?php if(session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                           <i class="fas fa-check-circle"></i>
                            <?=session()->getFlashdata('success')?>
                        </div>
                    </div>
                <?php endif; ?>
                <h3 class=" card-title m-0 font-weight-bold">Data Target Produksi</h3>
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
                        <th>#id target</th>
                        <th>Nama Produk</th>
                        <th>Target Produksi</th>
                        <th>Periode Target Pengerjaan</th>
                        <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($target_produksi as $row):
                                    ?>
                                        <tr>
                                        <td class="text-center"><?= $row['id_target'];?></td>
                                        <td><?= $row['nama_produk'];?></td>
                                        <td class="text-center"><?= $row['target_produksi'];?></td>
                                        <td><?= $row['periode_target'];?></td>
                                            <td>
                                              <a class="btn btn-sm btn-info" href="<?= base_url('target_produksi/edittargetprod/'.$row['id_target']) ?>" role="button">
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
     
    </div>
    <!-- /.container-fluid -->
    </div>
       </section>
    <?= $this->endSection() ?>
