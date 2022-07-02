<?= $this->extend('purishop/webpuri') ?>

<?= $this->section('content') ?>
<title>Shop || Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<!-- Slider -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

     <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-i4bDQphhaZs2MmK-"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	 <br> <br>
	<div class="container-fluid">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?=base_url('web')?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Pembayaran 
			</span>
		</div>
	</div>
	 <br> <br>		
		<?php 
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="fa fa-check-circle"></i> Success!</h5>';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
        ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Detail Pembayaran 
                </div><br>
                    <div class="row container-fluid">
                        <div class="col-sm-6 ">
                            <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <h5 class="card-title">ID Transaksi:  <?= $detail[0]['id_transaksi'] ?></h5>
                                <p class="card-text">Tanggal: <?= date("d-m-Y", strtotime($detail[0]['waktu'])) ?></p>
                                <p class="card-text">Penerima:
                                    <strong><?= $detail[0]['nama_penerima'] ?></strong><br>
                                    Alamat: <?= $detail[0]['alamat'] ?>  Desa <?= $detail[0]['desa'] ?>, <br>
                                    Kec. <?= $detail[0]['kecamatan'] ?>,  Kab. <?= $detail[0]['kota'] ?>, <br>
                                    <?= $detail[0]['provinsi'] ?> <?= $detail[0]['kode_pos'] ?><br>
                                    Phone: <?= $detail[0]['no_hp'] ?>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <p class="card-text">Expedisi: <strong><?= $detail[0]['expedisi'] ?></strong></p>
                                <p class="card-text">Paket:  <strong><?= $detail[0]['paket'] ?></strong> </p>
                                <p class="card-text">Estimasi: <strong><?= $detail[0]['estimasi'] ?></strong></p>

                                    <?php
                                        $attributes = ['id_transaksi' => 'payment-form'];
                                    ?>
                                    <?php foreach($payment as $row): 
                                        $id_transaksi = $row->id_transaksi;
                                    endforeach; ?>
                                    <?= form_open('Penjualan/paymentgateway', $attributes) ?>
                                        <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?=$id_transaksi?>">
                                    </form>

                            </div>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="container">
                        <table class="table table-striped">
                            <h5 class="card-title font-monospace text-decoration-underline">Detail Produk</h5>
                            <thead>
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col" class="text-center">Qty</th>
                                    <th scope="col" class="text-right">Harga</th>
                                    <th scope="col" class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php foreach($detail as $row): ?>
                                <tr>
                                    <th scope="row"><?= $row['nama_produk'];?></th>
                                    <td class="text-center"><?= $row['jumlah'];?></td>
                                    <td class="text-right"><?= rupiah($row['harga']);?></td>
                                    <td class="text-right"><?= rupiah($row['total']);?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">                    
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td class="text-right"><?= rupiah($row['subtotal']);?></td>
                                    </tr>
                                    <tr>
                                        <th>Ongkir:</th>
                                        <td class="text-right"><?= rupiah($row['ongkir']);?></td>
                                    </tr>
                                    <tr>
                                        <th>Total Bayar:</th>
                                        <td class="text-right"><?= rupiah($row['total_bayar']);?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                     <div class="container-fluid">
                         <form id="payment-form" method="post" action="<?=base_url()?>/Penjualan/finish">
                            <input type="hidden" name="result_type" id="result-type" value=""></div>
                            <input type="hidden" name="result_data" id="result-data" value=""></div><br>
                            <input type="hidden" id="id_transaksi" name="id_transaksi" value="<?= $id_transaksi?>">
                           
                            <a class="btn btn-sm btn-secondary" href="<?=site_url('Penjualan/pembayaran')?>" role="button"><i class="zmdi zmdi-arrow-left"></i> Kembali</a>
                            <button type="button" id="pay-button" class="btn btn-sm btn-primary"> Via Payment Gateway</button>
                        </form>
                    </div><br>
                    <div class="container-fluid">
                    </div><br>
            </div>
        </div>
    </div>
</div>
</div>
	<br> <br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
  
<script type="text/javascript">
  
    $('#pay-button').click(function(event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
        
        var id_transaksi = "<?=$id_transaksi?>";
       

    $.ajax({
        type: 'post',
        url: '<?=base_url()?>/Penjualan/token/'+id_transaksi,
        data : {
                id_transaksi: id_transaksi,
               
              },
        cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

</script>
<?= $this->endSection() ?>



