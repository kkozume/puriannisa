<?= $this->extend('layout/default') ?>
<!-- Content Wrapper. Contains page content -->

<?= $this->section('content') ?>
<title>Home || Puri Utami</title>
<? $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Penerimaan Order Pembelian</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Penerimaan Order Pembelian</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <!-- <div class="col-md-6"> -->
            <div class="col-xs-4">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h6 class="card-title font-weight-bold">Penerimaan Order Pembelian</h6>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <?php
                    if (isset($validation)) {
                        echo $validation->listErrors();
                    }
                    ?>


                    <!-- form start -->
                    

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="supplier">Supplier</label>
                            <input type="text" class="form-control" placeholder="Masukkan supplier" name="id_supplier" id="id_supplier" />
                        </div>
                    </div>

                        <div class="form-group col-md-1">
                            <label for="">Aksi</label>
                            <div class="input-group">

                                <button class="btn btn-sm btn-success" type="submit"><i class=""></i> Simpan</button>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <h3 class=" card-title m-0 font-weight-bold">Daftar Order</h3>
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
                <th>#id</th>
                
              </tr>
            </thead>
            <tbody>
          
              <?php
                //    endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>

    <div class="row">
        <div class="col-12">
            <a class="btn btn-secondary btn-sm" href="<?= site_url('default') ?>" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    
    </div>
    </div>
</section>

<?= $this->endSection() ?>