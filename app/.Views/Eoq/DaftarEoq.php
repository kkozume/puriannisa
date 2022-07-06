<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>EOQ || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>EOQ</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
          <li class="breadcrumb-item active">EOQ</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="section">
  <div class="container-fluid">
    <div class="card shadow mb-4">
      
    </div>
    <div class="card shadow mb-4">
      <!-- DataTales Example -->
      <div class="card-header py-3">
        <?php

                                                use App\Controllers\Eoq;

if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">x</button>
              <i class="fas fa-check-circle"></i>
              <?= session()->getFlashdata('success') ?>
            </div>
          </div>
        <?php endif; ?>
        <h3 class=" card-title m-0 font-weight-bold">Data EOQ</h3>
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
                <!-- <th>#id</th> -->
                <th>kode EOQ</th>
                <th>nama bahan </th>
                <th>Target Produksi</th>
                <th>Satuan</th>
                <th>Safety Stock</th>
                <th>Reorder Point</th>
                <th>EOQ</th>
                <th>Jumlah Pemesanan</th>
                <th>Biaya Optimal</th>
                <!-- <th>Aksi</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($AmbilEoq as $row) :
                // foreach ($target_produksi as $row2) :
                // foreach ($bahan_baku as $row3) :
                  $eoq = ceil(sqrt((2*$row['target_produksi']*$row['biaya_pesan'])/$row['biaya_simpan']));
                  $jumlah_pemesanan = ($row['target_produksi']/$row['eoq']);
                  $biaya_optimal = (30*$row['eoq']*$row['biaya_pesan']/2);
              ?>
                <tr>
                  <td><?= $row['kode_eoq']; ?></td>
                  <td><?= $row['nama_bahanbaku']; ?></td>
                  <td><?= $row['target_produksi']; ?></td>
                  <td><?= $row['satuan_bb']; ?></td>
                  <td><?= $row['safety_stock']; ?></td>
                  <td><?= $row['reorder_point']; ?></td>
                  <td><?= $eoq; ?></td>
                  <td><?= $jumlah_pemesanan; ?></td>  
                  <td><?= $biaya_optimal; ?></td>
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
  <!-- /.container-fluid -->
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
            var var_target_produksi = Number(document.getElementById("target_produksi").value.replace(/[^\d.-]/g, ''));
            // var hadir = document.getElementById("hadir").value;
            var var_biaya_pesan = Number(document.getElementById("biaya_pesan").value.replace(/[^\d.-]/g, ''));
            var var_biaya_simpan = document.getElementById("biaya_simpan").value.replace(/[^\d.-]/g, '');
            var eoq = document.getElementById("eoq");
            // eoq.value = Math.sqrt((2*var_biaya_pesan)/var_biaya_simpan); 
            eoq.value = ceil(sqrt((2*var_biaya_pesan)/(var_biaya_pesan/100)))
            
            //document.getElementById("x").innerHTML = myarr[0];
        }
        
    </script>
<!-- <script>
let a = Math.sqrt(0);
let b = Math.sqrt(1);
let c = Math.sqrt(9);
let d = Math.sqrt(64);
let e = Math.sqrt(-9);

document.getElementById("demo").innerHTML =
a + "<br>" + b + "<br>" + c + "<br>" + d + "<br>" + e;
</script> -->


</section>
 <?= $this->endSection() ?> 