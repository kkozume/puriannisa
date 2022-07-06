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
        <h1 class="m-0">Penjualan</h1>

      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Penjualan</li>
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
            <h6 class="card-title font-weight-bold">Tambah Penjualan</h6>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->

      
      <?php
        if(isset($validation)){
          echo $validation->listErrors();
        }
      ?>
        <div class="row">
       <h2>Tambah Penjualan</h2>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('penjualan/detail_pnj')?>" method="POST">
                                <div class="form-group row">
                                    <label for="id_pnj" class="col-sm-2 col-form-label">ID Jual</label> <br>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_pnj" name="id_pnj" value="<?= $kode ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label> <br>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d')?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="produk" class="col-sm-2 col-form-label">produk</label> <br>
                                    <div class="col-sm-8">
                                        <select name="produk" id="produk" class="form-control" required>
                                            <option value="">-</option>
                                            <?php foreach ($produk as $key => $value) { ?>
                                            <option value="<?= $value->kode_produk?>"><?= $value->nama_produk?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="jumlah" id="" min="1" value="1">
                                    </div>
                                </div>
                                <hr>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-sm btn-info">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- <div class="table-responsive"> -->
                        <div class="card">
                            <div class="card-body">
                                <h3>Detail Penjualan</h3>
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Produk</th>
                                            <th>Nama produk</th>
                                            <th>Harga Satuan</th>
                                            <th>jumlah</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no=1;
                                    $total = 0;
                                    $subtotal = 0;
                                    $grandtot = 0;
                                    foreach ($list_detail as $item) { ?>
                                        <?php $subtotal += $item->harga * $item->jumlah; 
                                        $grandtot = $subtotal + $total?>
                                        <tr>
                                            <td><?= $no++?></td>
                                            <td><?= $item->kode_produk?></td>
                                            <td><?= $item->nama_produk?></td>
                                            <td><?= $item->harga?></td>
                                            <td><?= $item->jumlah?></td>
                                            <td><?= $item->harga * $item->jumlah?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>Total</th>
                                        <th colspan="6" class="text-right"><?= $grandtot?></th>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <?php if ($detil->getNumRows() != 0) { ?>
                                    <form action="<?= base_url('penjualan/save_penjualan')?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $kode ?>">
                                    <input type="hidden" name="total" value="<?= $total1 ?>">
                                    <div class="form-group row"> <br>
                                        <label for="pelanggan" class="col-sm-3 col-form-label">Pelanggan</label> <br>
                                        <div class="col-sm">
                                            <select name="pelanggan" id="pelanggan" class="form-control" required>
                                            <option value="">-</option>
                                                <?php foreach ($pelanggan as $value) { ?>
                                                <option value="<?= $value->id_pelanggan?>"><?= $value->nama_pelanggan?></option> <br>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- <a href="" class="btn btn-info">Selesai</a> -->
                                    <button type="submit" class="btn btn-info btn-sm">Selesai</button>
                                    </form>
                                <?php }?>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="<?= base_url('dashboard/dashboard.js') ?>"></script>
    <script>
		$(document).ready(function(){
			// Format mata uang.
			$('#harga,#hpp,#total').mask('0,000,000,000,000,000,000,000', {reverse: true});			
			
		})
	</script> 
    <script>
    function number_format (number, decimals, decPoint, thousandsSep) { 
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
            var n = !isFinite(+number) ? 0 : +number
            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
            var s = ''
            var toFixedFix = function (n, prec) {
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
        function myFunction(){
            var var_harga = Number(document.getElementById("harga").value.replace(/[^\d.-]/g, ''));
            var jumlah = document.getElementById("jumlah").value;
            var var_hpp = Number(document.getElementById("hpp").value.replace(/[^\d.-]/g, ''));
            var  total = document.getElementById("total");
            total.value = number_format(var_harga-var_hpp); //jumlah dikali harga
            //document.getElementById("x").innerHTML = myarr[0];
        }
        </script>
  </body>
</html>

   <!-- /.container-fluid -->
    </div>
    <!-- /.card -->
</section>
<?= $this->endSection() ?>