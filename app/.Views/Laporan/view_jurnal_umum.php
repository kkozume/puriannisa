<?=$this->extend('layout/default')?>
<!-- Content Wrapper. Contains page content -->

<?= $this->section('content')?>
<title>Jurnal Umum || Puri Utami</title>
<?$this->endSection()?>

<?= $this->section('content')?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">JURNAL UMUM</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">JURNAL UMUM</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
                <!-- Default box -->
            <div class="card shadow mb-4">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
              <div class="col">
                  <div class="card">
                    <div class="card-body">
                        
                        <div class="text-center"><b>Jurnal Umum</b></div>
                        <div class="text-center">Periode </div>
                    </div>
                  </div>
              </div>
            </div> 
      <p>
                <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr class="table-secondary"> 
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Ref</th>
              <th>Debet</th>
              <th>Kredit</th>
            </tr>
          </thead>
          <tbody>
                <?php
                    foreach($jurnal as $row):
                        ?>
                            <tr>
                                <td><?= $row->tgl_jurnal;?></td>
                                <td><?= $row->keterangan;?></td>
                                <td><?= $row->ref;?></td>
                                <td style="text-align:right"><?php if($row->KREDIT) {
                                  echo rupiah($row->KREDIT);
                                } ?></td>
                                <td style="text-align:right"><?php if($row->DEBET) {
                                  echo rupiah($row->DEBET);
                                } ?></td>
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
          