<?= $this->extend('purishop/webpuri') ?>

<?= $this->section('content') ?>
<title>Shop || Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<!-- breadcrumb -->
    <br> <br>
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?=base_url('web')?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Detail Penjualan
			</span>
		</div>
	</div>
	 <br> <br>	
	<!-- Shoping Cart -->
	<!-- <form class="bg0 p-t-75 p-b-85"> -->
		<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<thead>
									<tr class="table_head">
										<th class="column-1"><h6><strong> Detail Pengiriman</strong></h6></th>
									</tr>
								</thead>
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<h6><strong> Penerima : </strong></h6>
                            <address>
                                <strong><?= $detail[0]['nama_penerima'] ?></strong><br>
                                <?= $detail[0]['alamat'] ?>  Desa <?= $detail[0]['desa'] ?>, <br>
                                Kec. <?= $detail[0]['kecamatan'] ?>,  Kab. <?= $detail[0]['kota'] ?>, <br>
                                <?= $detail[0]['provinsi'] ?> <?= $detail[0]['kode_pos'] ?><br>
                                Phone: <?= $detail[0]['no_hp'] ?>
                            </address>
						</div>
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<h6><strong> Jasa Pengiriman : </strong></h6>
                            <p><strong>Expedisi : </strong>  <?= $detail[0]['expedisi'] ?></p><br>
                            <p><strong>Paket : </strong>  <?= $detail[0]['paket'] ?></p><br>
                            <p><strong>Estimasi : </strong>  <?= $detail[0]['estimasi'] ?></p><br>
                            <p><strong>No. Resi : </strong>  <?= $detail[0]['no_resi'] ?></p>
						</div>
					</div>
				</div>
				</div>
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<thead>
									<tr class="table_head">
										<th class="column-1">Produk</th>
										<th class="column-2"></th>
										<th class="column-3">Harga</th>
										<th class="column-4">Quantity</th>
										<th class="column-5">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($detail as $row): ?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="<?= base_url('images/upload/'.$row['gambar']); ?>" alt="IMG">
											</div>
										</td>
										<td class="column-2"><?= $row['nama_produk'];?></td>
										<td class="column-3 text-right"><?= rupiah($row['harga']);?></td>
										<td class="column-4"><?= $row['jumlah'];?></td>
										<td class="column-5 text-right"><?= rupiah($row['total']);?></td>
									</tr>
									<!-- penutup foreach -->
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Detail Belanja
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
                                <span class="stext-110 cl2">
									<strong>ID Transaksi : </strong> 
								</span>
                                <br>
								<span class="stext-110 cl2">
									<strong>Tanggal : </strong> 
								</span>
                                <br>
								<span class="stext-110 cl2">
									Tipe Pembayaran :  
								</span>
								<br>
								<span class="stext-110 cl2">
									Tanggal Bayar : 
								</span>
								<br>
								<span class="stext-110 cl2">
									Status Transaksi : 
								</span>
							</div>

							<div class="size-209 text-right">
								<span class="mtext-110 cl2">
									<strong><?= $detail[0]['id_transaksi'] ?></strong> 
								</span>
								<br>
								<span class="mtext-110 cl2">
									<strong><?= date("d-m-Y", strtotime($detail[0]['waktu'])) ?></strong> 
								</span>
								<br>
								<span class="mtext-110 cl2">
									<?= $detail[0]['payment_type'] ?>
								</span>
								<br>
								<span class="mtext-110 cl2">
									<?= date("d-m-Y", strtotime($detail[0]['transaction_time'])) ?>
								</span>
                                <br>
								<span class="mtext-110 cl2">
									<?php if ($row['transaction_status']=='pending') { ?>
                                        <span class="badge badge-secondary">Pending</span>
                                    <?php }else if($row['transaction_status']=='settlement') { ?>
                                        <span class="badge badge-success">Pembayaran Sukses</span>
                                    <?php }?>
								</span>
							</div>
						</div>
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Subtotal : 
								</span>
                                <br>
								<span class="mtext-101 cl2">
									Ongkir : 
								</span>
                                <br>
								<span class="mtext-101 cl2">
									<strong>Total Bayar : </strong> 
								</span>
							</div>
							<div class="size-209 p-t-1 text-right">
								<span class="mtext-110 cl2">
									<?= rupiah($row['subtotal']);?>
								</span>
                                  <br>
								<span class="mtext-110 cl2">
									<?= rupiah($row['ongkir']);?>
								</span>
                                  <br>
								<span class="mtext-110 cl2">
									<strong><?= rupiah($row['total_bayar']);?></strong> 
								</span>
							</div>
				</div>
			</div>
		</div>
        <div class="ml-5 ">
				<a class="btn btn-sm btn-secondary" href="<?=site_url('Penjualan/pembayaran')?>" role="button"><i class="zmdi zmdi-arrow-left"></i> Kembali</a>
		</div><br><br>
	<!-- </form> -->
<?= $this->endSection() ?>