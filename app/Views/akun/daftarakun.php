<?=$this->extend('layout/default')?>
<!-- Content Wrapper. Contains page content -->

<?= $this->section('content')?>
<title>COA || Puri Utami</title>
<?$this->endSection()?>

<?= $this->section('content')?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">COA</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">COA</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= site_url('akun') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Data COA</a>
            </div>
            </div>
                <!-- Default box -->
            <div class="card shadow mb-4">
              <!-- /.card-header -->
              <div class="card-body">
                <h2>Data COA</h2>
                <table id="example2" class="table table-bordered table-hover">
                <thead>
            <tr>
              <th>#id</th>
              <th>Kode Akun</th>
              <th>Nama Akun</th>
              <th>Header Akun</th>
              <th>Posisi Debet/Kredit</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
                <?php
                    foreach($akun as $row):
                        ?>
                            <tr>
                                <td><?= $row['id'];?></td>
                                <td><?= $row['kode_akun'];?></td>
                                <td><?= $row['nama_akun'];?></td>
                                <td><?= $row['header_akun'];?></td>
                                <td><?= $row['posisi_d_c'];?></td>
                                <td>
                                  <a class="btn btn-info" href="<?= base_url('akun/editakun/'.$row['id']) ?>" role="button">
                                    <span data-feather="edit"></span>Ubah
                                  </a>
                                  <!-- <a onclick="deleteConfirm('<?php echo base_url('akun/deleteakun/'.$row['id']) ?>')" class="btn btn-danger btn-sm" href="#" role="button">
                                    <span data-feather="trash-2"></span>Hapus
                                  </a> -->
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
              <!-- /col -->
          </section>
          <?=$this->endSection()?>
          