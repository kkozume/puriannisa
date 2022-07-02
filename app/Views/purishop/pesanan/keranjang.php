<?= $this->extend('purishop/webpuri') ?>

<?= $this->section('content') ?>
<title>Shop || Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<!-- breadcrumb -->
    <br> <br>
	<div class="container-fluid">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?=base_url('web')?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Keranjang Belanja
			</span>
		</div>
	</div>
	 <br> <br>	
	<!-- ubah & hapus & hapus semua keranjang -->
		<div id="flashshop" data-flashshop="<?=session()->getFlashdata('success')?>"></div>
	<!-- Shoping Cart -->
	<!-- <form class="bg0 p-t-75 p-b-85"> -->
		 <?= form_open('pesanan/update') ; ?>
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
										<th class="column-5">Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$i = 1;
										$qty = 0;
										$total_berat = 0;
										$keranjang = $cart->contents();
									?>
									<?php foreach ($keranjang as $key => $value) { 
										$qty = $qty + $value['qty'];
										$total_berat = $total_berat + ($value['qty'] * $value['options']['berat']);
									?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="<?= base_url('images/upload/'.$value['options']['gambar']); ?>" alt="IMG">
											</div>
										</td>
										<input type="hidden" id="berat" name="berat" value=<?= $value['qty'] * $value['options']['berat'];?>>
										<td class="column-2"><?= $value['name'];?></td>
										<td class="column-3 text-right"><?= rupiah($value['price']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td class="column-4">
											<div class="wrap-num-product flex-w m-l-auto m-r-0">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>

												<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty<?= $i++ ?>" value=<?= $value['qty'];?>>

												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
										</td>
										<td class="column-5 text-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= rupiah($value['subtotal']);?></td>
										<td class="column-5 text-right">
											<a href="<?= base_url('pesanan/delete/'.$value['rowid'])?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
									<!-- penutup foreach -->
									<?php } ?>
								</tbody>
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<button type="submit" class="btn btn-sm btn-primary" ><i class="fa fa-save"></i> Update</button>
							<a href="<?= base_url('pesanan/clear')?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Hapus Semua</i></a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Ringkasan Belanja
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Total Barang :
								</span>
								<br>
								<span class="stext-110 cl2">
									Total Berat :
								</span>
							</div>

							<div class="size-209 text-right">
								<span class="mtext-110 cl2">
									<?= $qty; ?> Pcs
								</span>
								<br>
								<span class="mtext-110 cl2">
									<?= $total_berat; ?> gram
								</span>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total Belanja :
								</span>
							</div>

							<div class="size-209 p-t-1 text-right">
								<span class="mtext-110 cl2">
									<?= rupiah($cart->total()) ?>
								</span>
							</div>
						</div>
						<a href="<?= base_url('penjualan/lanjut/'.$cart->total()) ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" id="tmbh"> Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- </form> -->
<?= $this->endSection() ?>