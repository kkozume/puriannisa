<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Neraca Saldo || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Neraca Saldo</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
          <li class="breadcrumb-item active">Neraca Saldo</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="section">
 
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
        <h3 class=" card-title m-0 font-weight-bold">Neraca Saldo</h3>
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

          

          <div class="form-group col-md-3" style="padding: 15px">
                    <form action="<?= base_url('laporan/lihatneracasaldo') ?>" method="post">
                        
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun</label>
                                    <select class="form-select" aria-label="Default select example" name="tahun" id="tahun">
                                        <?php
                                            foreach($tahun as $row):
                                                $tahun = $row->tahun;
                                                ?>
                                                    <option value="<?=$tahun?>"><?=$tahun?></option>
                                                <?php
                                            endforeach;
                                        ?>
                                    </select>
                            </div>
                            <div id="x"></div>

                            <div class="input-group">
                            <button class="btn btn-sm btn-info" type="submit"><i class=""></i> Lihat</button>
                            </button>
                            </div>
                        </form>
                    </div>
                    
        
        
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
  </div>

  <!-- timeline -->

      <!-- untuk jquery AJAX -->
     
     <!-- akhir jquery AJAX -->  

</section>
<?= $this->endSection() ?>