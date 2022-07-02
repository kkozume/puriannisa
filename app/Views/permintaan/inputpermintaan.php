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
                <h1 class="m-0">Permintaan Pembelian</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Permintaan Pembelian</li>
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
                        <h6 class="card-title font-weight-bold">Input Permintaan Pembelian</h6>
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
                    <?= form_open('permintaan') ?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_permintaan">No Permintaan</label>
                            <input type="text" class="form-control" placeholder="Masukkan id permintaan" name="id_permintaan" id="id_permintaan" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_permintaan">Tanggal Permintaan</label>
                            <input type="date" class="form-control" name="tgl_permintaan" id="tgl_permintaan" />
                        </div>
                    </div>

                    <!-- <div class="card">
                            <div class="card-header bg-white">
                                Input Transaksi Safety Stock
                            </div>
                            <div class="card-body"> -->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="id_bahanbaku">Nama Bahan Baku</label>
                            <div class="input-group mb-2">
                                <!-- <input type="text" class="form-control" placeholder="Input Nama Bahan Baku" name="id_bahanbaku" id="id_bahanbaku" value="<?= set_value('id_bahanbaku') ?>" />
                                <div class="input-group-append"> -->
                                <select class="form-select" name="id_bahanbaku" id="id_bahanbaku">
                                    <?php
                                    foreach ($bahan_baku as $row) :
                                    ?>
                                        <option value="<?= $row['id_bahanbaku'] ?>"><?= $row['nama_bahanbaku'] ?></option>
                                    <?php
                                    endforeach;

                                    ?>
                                </select>

                                <!-- <button class="btn btn-outline-primary" type="button" id="tombolCariBahan">
                                            <i class="fa fa-search"></i> -->
                            </div>
                        </div>

                        <div class="form-group col-sm-2">
                        <label for="harga_permintaan">Harga Permintaan</label>
                        <input type="text" class="form-control" name="harga_permintaan" id="harga_permintaan"/>
                        </div>

                        <div class="form-group col-sm-2">
                        <label for="id_bahanbaku">QTY</label>
                        <input type="number" class="form-control" name="qty_bb" id="qty_bb" min="1" value="1">
                    </div>

                    <div class="form-group col-md-1">
                        <label for="">Aksi</label>
                         <div class="input-group">

                            <button class="btn btn-sm btn-success" type="submit"><i class=""></i> Simpan</button>
                            </button>
                        </div>
                    </div>

                    </div>
    
                 
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>

    <h3 class=" card-title m-0 font-weight-bold">Data Permintaan</h3>
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
                        <th>#id_permintaan</th>
                        <th>tgl_permintaan</th>
                        <th>Nama bahanbaku</th>
                        <th>harga_permintaan</th>
                        <th>QTY</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($permintaan as $row) :
                    ?>
                        <tr>
                            <td><?= $row['id_permintaan']; ?></td>
                            <td><?= $row['tgl_permintaan']; ?></td>
                            <td><?= $row['id_bahanbaku']; ?></td>
                            <td><?= $row['harga_permintaan']; ?></td>
                            <td><?= $row['qty_bb']; ?></td>

                            <td>
                                <a class="btn btn-sm btn-info" href="<?= base_url('permintaan/editpermintaan/' . $row['id_permintaan']) ?>" role="button">
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

    <div class="row">
        <div class="col-12">
            <a class="btn btn-secondary btn-sm" href="<?= site_url('default') ?>" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    </div>
    </div>
</section>

<?= $this->endSection() ?>