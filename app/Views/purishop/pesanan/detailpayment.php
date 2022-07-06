<?= $this->extend('purishop/webpuri') ?>

<?= $this->section('content') ?>
<title>Shop || Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<!-- Slider -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	 <br> <br>
	<div class="container-fluid">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?=base_url('web')?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Detail Payment Gateway 
			</span>
		</div>
	</div>
	 <br> <br>		
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Detail Payment Gateway  
                </div><br>
                    <div class="row container-fluid">
                        <div class="col-sm-6 ">
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ID Transaksi:  <?= $detail[0]['id_transaksi'] ?></h5>
                                <h5 class="card-title">ID Order:  <?= $detail[0]['order_id'] ?></h5>
                                <p class="card-text">Tanggal: <?= date("d-m-Y", strtotime($detail[0]['transaction_time'])) ?></p>
                                <?php if ($detail[0]['transaction_status']=='pending') { ?>
                                    <p class="card-text">Status Transaksi: <span class="badge badge-secondary">Pending</span></p>
                                <?php }else if($detail[0]['transaction_status']=='settlement'){?>
                                     <p class="card-text">Status Transaksi: <span class="badge badge-success">Pembayaran Sukses</span></p>
                                <?php }?>

                                <?php if(isset($detail[0]['pdf_url'])) { ?>
                                    <a href="<?= $detail[0]['pdf_url'] ?>" class="btn btn-sm btn-primary" role="button"> <i class="zmdi zmdi-download"></i> Download</a>
                                <?php }else {?>
                                    <p class="card-text">-</p>
                                <?php }?>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-body">
                                <p class="card-text">Tipe Pembayaran: <strong><?= $detail[0]['payment_type'] ?></strong></p>

                                <?php if($detail[0]['payment_type']=='echannel') { ?>
                                    <p class="card-text">Bill Key:  <strong><?= $detail[0]['bill_key'] ?></strong></p>
                                    <p class="card-text">Biller Code:  <strong><?= $detail[0]['biller_code'] ?></strong></p>
                                <?php }else if($detail[0]['payment_type']=='cstore'){?>
                                     <p class="card-text">Payment Code:  <strong><?= $detail[0]['payment_code'] ?></strong></p>
                                <?php }else if($detail[0]['payment_type']=='bank_transfer'){?>
                                     <p class="card-text">Va Number:  <strong><?= $detail[0]['va_number'] ?></strong></p>
                                     <p class="card-text">Bank:  <strong><?= $detail[0]['bank'] ?></strong></p>
                                     <p class="card-text">Va Number Permata:  <strong><?= $detail[0]['permata_va_number'] ?></strong></p>
                                <?php }?>
                            </div>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="container-fluid">
                        <a class="btn btn-sm btn-secondary" href="<?=site_url('Penjualan/pembayaran')?>" role="button"><i class="zmdi zmdi-arrow-left"></i> Kembali</a>
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
<?= $this->endSection() ?>



