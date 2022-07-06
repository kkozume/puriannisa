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
				Checkout
			</span>
		</div>
	</div>
	 <br> <br>		
	<!-- Shoping Cart -->
	<!-- <form class="bg0 p-t-75 p-b-85"> -->
	<div class="container-fluid">		
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
										<td class="column-4 text-center"><?= $value['qty'];?> Pcs</td>
										<td class="column-5 text-right"><?= rupiah($value['subtotal']);?></td>
									</tr>
									<!-- penutup foreach -->
									<?php } ?>
								</tbody>
							</table>
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
								<br><br>
								<span class="stext-110 cl2">
									Total Belanja :
								</span>
								<br>
								<span class="stext-110 cl2">
									Biaya Pengiriman :
								</span>
							</div>

							<div class="size-209 text-right">
								<span class="mtext-110 cl2 ">
									<?= $qty; ?> Pcs
								</span>
								<br>
								<span class="mtext-110 cl2 ">
									<?= $total_berat; ?> gram
								</span>
								<br><br>
								<span class="mtext-110 cl2 ">
									<?= rupiah($cart->total()) ?>
								</span>
								<br>
								<span class="mtext-110 cl2 " id="ongkir">
									
								</span>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total Tagihan :
								</span>
							</div>

							<div class="size-209 p-t-1 text-right">
								<span class="mtext-110 cl2" id="total_bayar">
									
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	<?php $validation =  \Config\Services::validation(); ?>
	<?= form_open('penjualan/lanjutbayar') ; ?>
		<p class="text-uppercase fw-bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat Pengiriman :</p>
	<div class="container-fluid">
	<div class="card">
		<div class="card-body row g-3">
			<div class="col-md-6">
				<label for="provinsi" class="form-label">Provinsi</label>
				<?php
                        if($validation){
                            //untuk mengecek apakah ada error pada elemen field provinsi
                            if ( $validation->hasError('provinsi') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong>Error: <?=$validation->getError('provinsi')?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </div>
                            <?php
                            }
                        }
                    ?>
				<select name="provinsi" id="provinsi" class="form-control custom-select" aria-label="Default select example"></select>
			</div>
			<div class="col-md-6">
				<label for="kota" class="form-label">Kabupaten/Kota</label>
				<?php
                        if($validation){
                            //untuk mengecek apakah ada error pada elemen field kota
                            if ( $validation->hasError('kota') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong>Error: <?=$validation->getError('kota')?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </div>
                            <?php
                            }
                        }
                ?>
				<select name="kota" id="kota" class="form-control custom-select" aria-label="Default select example"></select>
			</div>
			<div class="col-md-6">
				<label for="expedisi" class="form-label">Ekspedisi</label>
				<?php
                        if($validation){
                            //untuk mengecek apakah ada error pada elemen field expedisi
                            if ( $validation->hasError('expedisi') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong>Error: <?=$validation->getError('expedisi')?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </div>
                            <?php
                            }
                        }
                ?>
				<select name="expedisi" id="expedisi" class="form-control custom-select" aria-label="Default select example"></select>
			</div>
			<div class="col-md-6">
				<label for="paket" class="form-label">Paket</label>
				<?php
                        if($validation){
                            //untuk mengecek apakah ada error pada elemen field paket
                            if ( $validation->hasError('paket') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong>Error: <?=$validation->getError('paket')?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </div>
                            <?php
                            }
                        }
                ?>
				<select name="paket" id="paket" class="form-control custom-select" aria-label="Default select example"></select>
			</div>
			<div class="col-md-6">
				<label for="kecamatan" class="form-label">Kecamatan</label>
				<?php
                        if($validation){
                            //untuk mengecek apakah ada error pada elemen field kecamatan
                            if ( $validation->hasError('kecamatan') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong>Error: <?=$validation->getError('kecamatan')?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </div>
                            <?php
                            }
                        }
                ?>
				<input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= set_value('kecamatan')?>" placeholder="Diisi dengan kecamatan">
			</div>
			<div class="col-md-6">
				<label for="desa" class="form-label">Desa/Kelurahan</label>
				<?php
                        if($validation){
                            //untuk mengecek apakah ada error pada elemen field desa
                            if ( $validation->hasError('desa') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong>Error: <?=$validation->getError('desa')?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </div>
                            <?php
                            }
                        }
                ?>
				<input type="text" class="form-control" id="desa" name="desa" value="<?= set_value('desa')?>" placeholder="Diisi dengan Desa/Kelurahan">
			</div>
			<div class="col-12">
				<label for="alamat" class="form-label">Alamat Tujuan</label>
				<?php
                        if($validation){
                            //untuk mengecek apakah ada error pada elemen field alamat
                            if ( $validation->hasError('alamat') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong>Error: <?=$validation->getError('alamat')?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </div>
                            <?php
                            }
                        }
                ?>
				  <textarea class="form-control" id="alamat" name="alamat" placeholder="Diisi dengan alamat" rows="4"></textarea>
			</div>
			<div class="col-md-6">
				<label for="nama_penerima" class="form-label">Nama Penerima</label>
				<?php
                        if($validation){
                            //untuk mengecek apakah ada error pada elemen field nama_penerima
                            if ( $validation->hasError('nama_penerima') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong>Error: <?=$validation->getError('nama_penerima')?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </div>
                            <?php
                            }
                        }
                ?>
				<input type="text" class="form-control" id="nama_penerima" name="nama_penerima" value="<?= set_value('nama_penerima')?>" placeholder="Diisi dengan nama penerima">
			</div>
			<div class="col-md-6">
				<label for="no_hp" class="form-label">No Telp Penerima</label>
				<?php
                        if($validation){
                            //untuk mengecek apakah ada error pada elemen field no_hp
                            if ( $validation->hasError('no_hp') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong>Error: <?=$validation->getError('no_hp')?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </div>
                            <?php
                            }
                        }
                ?>
				<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= set_value('no_hp')?>" placeholder="Diisi dengan No. telp penerima">
			</div>
			<div class="col-md-2">
				<label for="kode_pos" class="form-label">Kode Pos</label>
				<?php
                        if($validation){
                            //untuk mengecek apakah ada error pada elemen field kode_pos
                            if ( $validation->hasError('kode_pos') )
                            { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong>Error: <?=$validation->getError('kode_pos')?> </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    </div>
                            <?php
                            }
                        }
                ?>
				<input type="number" class="form-control" id="kode_pos" name="kode_pos" min="1" value="<?= set_value('kode_pos')?>" placeholder="Diisi dengan kode pos">
			</div>
			<br><br><br><br>
			<div class="col-12">
				<button type="submit" class="btn btn-primary">Proses Check Out</button>
			</div>
		</div>
		</div>
		</div>
		</div>
	</div>
</div>
<!-- simpan transaksi -->
<input type="hidden" id="id_transaksi" name="id_transaksi" value="<?= isset($_SESSION['id_transaksi']) ? $_SESSION['id_transaksi'] : '';?>">

<input type="hidden" name="berat" value="<?= $total_berat; ?>">
<input type="hidden" name="estimasi">
<input type="hidden" name="subtotal" value="<?= $cart->total()?>" >
<input type="hidden" name="ongkir" >
<input type="hidden" name="total_bayar" >
<!-- end simpan transaksi -->
<!-- simpan detail transaksi -->
<?php 
	$i = 1;
	$harga = 1;
	$subtot = 1;
	$keranjang = $cart->contents();
?>
<?php
	foreach ($keranjang as $key => $value) { 
		echo form_hidden('jumlah' . $i++, $value['qty']);
		echo form_hidden('harga' . $harga++, $value['price']);
		echo form_hidden('subtotal' . $subtot++, $value['subtotal']);
?>
<!-- penutup foreach -->
<?php } ?>
<!-- end simpan detail transaksi -->
</form>
<br><br>
<!-- </form> -->
<!--===============================================================================================-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          // masukan data provinsi
            $.ajax({
                type: "POST",
                url: "<?= base_url('setting/rajaongkir')?>",
                success: function(hasil_provinsi){
                    // console.log(hasil_provinsi);
                    $("select[name=provinsi]").html(hasil_provinsi);
                }
            });

            // masukan data kota
            $("select[name=provinsi]").on("change", function() {
                var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
                $.ajax({
                  type: "POST",
                  url: "<?= base_url('setting/kota')?>",
                  data : 'id_provinsi=' + id_provinsi_terpilih,
                   success: function(hasil_kota){
                    // console.log(hasil_provinsi);
                    $("select[name=kota]").html(hasil_kota);
                   }
                });
            });

			// pilih expedisi
			 $("select[name=kota]").on("change", function() {
				 $.ajax({
                  type: "POST",
                  url: "<?= base_url('setting/expedisi')?>",
                   success: function(hasil_expedisi){
                    // console.log(hasil_provinsi);
                    $("select[name=expedisi]").html(hasil_expedisi);
                   }
				});
			});

			// pilih paket
			 $("select[name=expedisi]").on("change", function() {
				//  mendapatkan expedisi terpilih
				var expedisi_terpilih = $("select[name=expedisi]").val()
				//  mendapatkan kota tujuan terpilih
				var id_kota_tujuan_terpilih = $("option:selected","select[name=kota]").attr('id_kota');
				// mengambil data ongkos kirim
				var total_berat = <?= $total_berat ?>;
				// alert(total_berat);
				 $.ajax({
                  type: "POST",
                  url: "<?= base_url('setting/paket')?>",
				  data : 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                   success: function(hasil_paket){
                    // console.log(hasil_provinsi);
                    $("select[name=paket]").html(hasil_paket);
                   }
				});
			});

			// biaya ongkir
			$("select[name=paket]").on("change", function() {
				var dataongkir =  $("option:selected", this).attr('ongkir');
					// format mata uang
				var reverse = dataongkir.toString().split('').reverse().join(''),
					ribuan_ongkir = reverse.match(/\d{1,3}/g);
					ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
					
                $("#ongkir").html("Rp " + ribuan_ongkir);

				// total bayar
				// var ongkir = $("option:selected", this).attr('ongkir');
				var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $cart->total() ?>);
				// format mata uang
				var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
					ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
					ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');

				 $("#total_bayar").html("Rp " + ribuan_total_bayar);

				// estimasi dan ongkir
				var estimasi = $("option:selected", this).attr('estimasi');
				$("input[name=estimasi]").val(estimasi);
				$("input[name=ongkir]").val(dataongkir);
				$("input[name=total_bayar]").val(data_total_bayar);
			});

        });
    </script>
<?= $this->endSection() ?>
