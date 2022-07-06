<?=$this->extend('layout/default')?>
<!-- Content Wrapper. Contains page content -->

<?= $this->section('content')?>
<title>Supplier || Puri Utami</title>
<?$this->endSection()?>

<?= $this->section('content')?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Supplier</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
          <li class="breadcrumb-item active">Supplier</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="section">
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="<?= site_url('supplier') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Data Supplier</a>
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
        <h3 class=" card-title m-0 font-weight-bold">Data Supplier</h3>
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
            <th>#Id supplier</th>
              <th>Tanggal</th>
              <th>Nama Supplier</th>
              <th>Nama Toko</th>
              <th>Alamat supplier</th>
              <th>No telp supplier</th>
              <th>KTP</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
                <?php
                    foreach($supplier as $row):
                        ?>
                            <tr>
                                <td class="text-center"><?= $row['id_supplier'];?></td>
                                <td><?= $row['tanggal'];?></td>
                                <td><?= $row['nama_suplier'];?></td>
                                <td><?= $row['nama_cv'];?></td>
                                <td><?= $row['alamat_supplier'];?></td>
                                <td><?= $row['no_telp_supplier'];?></td>
                                <td>
                                  <a href="<?php echo base_url('images/upload/'.$row['ktp']) ?>" target="_blank">
                                  <img src="<?php echo base_url('images/upload/'.$row['ktp']) ?>" class="img-thumbnail" width="100">
                                  </a>
                                </td>
                                <td>
                                <a class="btn btn-sm btn-info" href="<?= base_url('supplier/editsupplier/'.$row['id_supplier']) ?>" role="button">
                                <i class="fas fa-edit"></i>  Ubah
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
              <!-- /col -->
              <script>
		$(document).ready(function(){
			// Format telepon.
			$('#no_telp_supplier').mask('000-000-000-000-000', {reverse: true});			
			
		})
	 </script> 
          </section>
          <?=$this->endSection()?>





          