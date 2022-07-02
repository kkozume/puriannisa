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
                <h1 class="m-0">Transaksi Reorder Point</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transaksi Reorder Point</li>
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
                <div class="card card-info" >
                    <div class="card-header">
                        <h6 class="card-title font-weight-bold">Input Transaksi Reorder Point</h6>
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
                    <?= form_open('reorder_point') ?>

                    <div class="form-row">
                        <div class="form-group col-md-6"style="padding: 15px">
                            <label for="id_reorder">Id Reorder Point</label>
                            <input type="text" class="form-control" placeholder="Masukkan id reorder" name="id_reorder" id="id_reorder"  value="<?= set_value('id_reorder') ?>"/>
                        </div>
                        <div class="form-group col-md-6"style="padding: 15px">
                            <label for="tgl_reorder">Tanggal Reorder</label>
                            <input type="date" class="form-control" name="tgl_reorder" id="tgl_reorder"  value="<?= set_value('tgl_reorder') ?>" />
                        </div>
                    </div>

                    <!-- <div class="card">
                            <div class="card-header bg-white">
                                Input Transaksi Safety Stock
                            </div>
                            <div class="card-body"> -->
                    <div class="form-row">
                        <div class="form-group col-md-3"style="padding: 15px">
                            <label for="id_bahanbaku">Nama Bahan </label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Input nama Bahan Baku" name="id_bahanbaku" id="id_bahanbaku"  value="<?= set_value('id_bahanbaku') ?>"/>
                                <div class="input-group-append">
                                    <!-- <button class="btn btn-outline-primary" type="button" id="tombolCariBahan">
                                            <i class="fa fa-search"></i> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2"style="padding: 15px">
                            <label for="pemakaian_rata">Pemakaian Rata Rata(m)</label>

                            <?php
                            if (isset($validation)) {
                                //untuk mengecek apakah ada error pada elemen field nama_produk
                                if ($validation->hasError('pemakaian_rata')) { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                            ?>
                                    
                            <?php
                                }
                            }
                            ?>
                            <input type="text" class="form-control" placeholder="Masukkan pem rata" name="pemakaian_rata" id="pemakaian_rata"  value="<?= set_value('pemakaian_rata') ?>" onkeyup="myFunction();" />
                        </div>

                        <div class="form-group col-md-2"style="padding: 15px">
                            <label for="lead_time">Lead Time(Hari)</label>

                            <?php
                            if (isset($validation)) {
                                //untuk mengecek apakah ada error pada elemen field nama_produk
                                if ($validation->hasError('lead_time')) { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                            ?>
                                   
                            <?php
                                }
                            }
                            ?>
                            <input type="text" class="form-control" placeholder="Masukkan lead time" name="lead_time" id="lead_time"  value="<?= set_value('lead_time') ?>" onkeyup="myFunction();"/>
                        </div>
                        <div class="form-group col-md-2" style="padding: 15px">
                            <label for="safety_stock">safety stock</label>
                            <?php
                            if (isset($validation)) {
                                //untuk mengecek apakah ada error pada elemen field nama_produk
                                if ($validation->hasError('safety_stock')) { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                            ?>
                                    
                            <?php
                                }
                            }
                            ?>
                            <input type="text" class="form-control" placeholder="Masukkan safetystock" name="safety_stock" id="safety_stock"  value="<?= set_value('safety_stock') ?>" onkeyup="myFunction();"/>
                        </div>
                        <div class="form-group col-md-2" style="padding: 15px">
                            <label for="reorder_point">Reorder Point</label>
                            <input type="text" class="form-control" placeholder="Masukkan ReorderPoint" name="reorder_point" id="reorder_point" value="<?= set_value('reorder_point') ?>" onkeyup="myFunction();" />
                        </div>

                        <div class="form-group col-md-1"style="padding: 15px">
                            <label for="">Aksi</label>
                            <div class="input-group">

                                <button class="btn btn-sm btn-success" type="submit"><i class=""></i> Simpan</button>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->

                </div>
            </div>
        </div>
    </div>

    
      <!-- </div> -->
      <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h3 class=" card-title m-0 font-weight-bold">Data Reorder Point</h3>
                            <!-- <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                            </div> -->
            </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#id reorder</th>
                                <th>Tgl reorder</th>
                                <th>Nama bahan </th>
                                <th>Pemakaian rata(m)</th>
                                <th>Lead time(Hari)</th>
                                <th>Safety stock(m)</th>
                                <th>Reorder point(m)</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($reorder_point as $row) :
                            ?>
                                <tr>
                                <td class="text-center"><?= $row['id_reorder']; ?></td>
                                <td><?= $row['tgl_reorder']; ?></td>
                                <td><?= $row['id_bahanbaku']; ?></td>
                                <td class="text-center"><?= $row['pemakaian_rata']; ?> m</td>
                                <td class="text-center"><?= $row['lead_time']; ?> hari</td>
                                <td class="text-center"><?= $row['safety_stock']; ?> m</td>
                                <td class="text-center"><?= $row['reorder_point']; ?> m</td>
                       
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


    <!-- <div class="row">
        <div class="col-12">
            <a class="btn btn-secondary btn-sm" href="<?= site_url('default') ?>" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div> -->
    </div>
    </div>
    </div>



    <script>
        function number_format(number, decimals, decPoint, thousandsSep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
            var n = !isFinite(+number) ? 0 : +number
            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
            var s = ''
            var toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec)
                return '' + (Math.round(n * k) / k)
                    .toFixed(prec)
            }
            // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || ''
                s[1] += new Array(prec - s[1].length + 1).join('0')
            }

            return s.join(dec)
        }
        //fungsi ini akan terpicu jika ada perubahan nilai pada elemen combo box  
        function myFunction() {
            var var_pemakaian_rata = Number(document.getElementById("pemakaian_rata").value.replace(/[^\d.-]/g, ''));
            var var_lead_time = Number(document.getElementById("lead_time").value.replace(/[^\d.-]/g, ''));
            var var_safety_stock = Number(document.getElementById("safety_stock").value.replace(/[^\d.-]/g, ''));
            var reorder_point = document.getElementById("reorder_point");
            // reorder_point.value = number_format(var_pemakaian_rata * var_lead_time)+var_safety_stock;
            reorder_point.value = number_format((var_pemakaian_rata * var_lead_time)+var_safety_stock);  
            //document.getElementById("x").innerHTML = myarr[0];
        }
        
    </script>

    <script>
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
    </script>

</section>

<?= $this->endSection() ?>