<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Karyawan || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Karyawan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="section">
        <div class="container-fluid">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= site_url('karyawan/index') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Data Karyawan</a>
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
                <h3 class="card-title m-0 font-weight-bold">Data Karyawan</h3>

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
                    <table id="dataTable" class="table table-bordered text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Karyawan</th>
                                <th>Nama Karyawan</th>
								<th>Tanggal Lahir</th>
								<th>Jenis Kelamin</th>
								<th>No Telepon</th>
								<th>Alamat</th>
								<th>Posisi</th>
                                <th>KTP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          foreach($karyawan as $row):
                              ?>
                                  <tr>
                                      <td><?= $row['id_karyawan'];?></td>
                                      <td><?= $row['nama_karyawan'];?></td>
									  <td><?= $row['tgl_lahir'];?></td>
									  <td><?= $row['jenis_kelamin'];?></td>
                                      <td><?= $row['no_telp'];?></td>
									  <td><?= $row['alamat'];?></td>
                                      <td><?= $row['jabatan'];?></td>
                                      <td class="text-center">
                                        <a href="<?php echo base_url('images/upload/'.$row['gambar']) ?>" target="_blank">
                                        <img src="<?php echo base_url('images/upload/'.$row['gambar']) ?>" class="img-thumbnail" width="100">
                                        </a>
                                      </td>
                                      <td>
                                        <a class="btn btn-info btn-sm" href="<?= base_url('karyawan/editkaryawan/'.$row['id_karyawan']) ?>" role="button">
                                        <i class="fas fa-edit"></i></span> Ubah
                                        </a>
                                      </td>
                                  </tr>
                              <?php
                          endforeach;    
                        ?>                                              
                        </tbody>
                    </table>
                </div>    
    <!-- /.container-fluid -->
    </div>
    <!-- /.card -->
</section>
<?= $this->endSection() ?>