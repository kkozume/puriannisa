<?=$this->extend('layout/default')?>
<!-- Content Wrapper. Contains page content -->

<?= $this->section('content')?>
<title>Bahan || Puri Utami</title>
<?$this->endSection()?>

<?= $this->section('content')?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Bahan </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
          <li class="breadcrumb-item active">Bahan </li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="section">
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="<?= site_url('bahan_baku') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Data Bahan </a>
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
        <h3 class=" card-title m-0 font-weight-bold">Data Bahan </h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
   
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
            <tr>
            <th>#Id bahan </th>
              <th>Nama bahan </th>
              <th>Satuan bahan </th>
              <th>Qty bahan </th>
              <th>Harga bahan </th>
              <th>Jenis bahan </th>
              <th>Biaya Pesan</th>
              <th>Biaya Simpan</th>
              <!-- <th>Metode penggunaan</th> -->
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
                <?php
                    foreach($bahan_baku as $row):
                        ?>
                            <tr>
                                <td class="text-center"><?= $row['id_bahanbaku'];?></td>
                                <td><?= $row['nama_bahanbaku'];?></td>
                                <td class="text-center"><?= $row['satuan_bb'];?></td>
                                <td class="text-center"><?= $row['qty_bb'];?></td>
                                <td  class="text-right"><?= rupiah($row['harga_bb']);?></td>
                                <td><?= $row['jenis_bb'];?></td>
                                <td  class="text-right"><?= rupiah($row['biaya_pesan']);?></td>
                                <td  class="text-right"><?= rupiah($row['biaya_simpan']);?></td>
                                <!-- metode_penggunaan -->
                                <td>
                                  <a class="btn btn-sm btn-info" href="<?= base_url('bahan_baku/editbahan/'.$row['id_bahanbaku']) ?>" role="button">
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



              
              <!-- /col -->
          </div>
  </div>
              <!-- /col -->
          </section>
          <?=$this->endSection()?>
          