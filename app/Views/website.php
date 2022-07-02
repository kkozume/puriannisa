<?= $this->extend('purishop/webpuri') ?>

<?= $this->section('content') ?>
<title>Shop || Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">
				<div class="item-slick1 bg-overlay1" style="background-image: url(<?=base_url()?>/website/images/slidepuri-01.png);" data-thumb="<?=base_url()?>/website/images/thumbpuri.png" data-caption="Mukena Collection">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Mukena Collection 
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									New arrivals
								</h2>
							</div>
								
						</div>
					</div>
				</div>

				<div class="item-slick1 bg-overlay1" style="background-image: url(<?=base_url()?>/website/images/slidepuri-02.png);" data-thumb="<?=base_url()?>/website/images/thumbpuri-02.png" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Sebuah Mode Penuh Surga
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									Lots of Choices
								</h2>
							</div>
								
						</div>
					</div>
				</div>

				<div class="item-slick1 bg-overlay1" style="background-image: url(<?=base_url()?>/website/images/slidepuri-03.png);" data-thumb="<?=base_url()?>/website/images/thumbpuri-03.png" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Memenuhi Kebutuhan Ibadah Anda
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									NEW SEASON
								</h2>
							</div>
								
						</div>
					</div>
				</div>
			</div>

			<div class="wrap-slick1-dots p-lr-10"></div>
		</div>
	</section>

	<!-- Banner -->
	<div class="sec-banner bg0 p-t-95 p-b-55">
        <div class="p-b-10 text-center">
            <h3 class="ltext-103 cl5">
                Product Trending
            </h3>
        </div>
		<div class="container">
			<div class="row">

			<?php foreach($kategori as $row):?> 
				<div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="<?php echo base_url('images/upload/'.$row['gambar']) ?>" alt="IMG-BANNER">

						<a href="<?=base_url('web')?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?= $row['nama_kategori'];?>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
                <?php endforeach;?>  

			<!-- Banner -->
	<div class="sec-banner bg0 p-t-95 p-b-55">
        <div class="p-b-10 text-center">
            <h3 class="ltext-103 cl5">
                Product Category
            </h3>
        </div>
		<div class="container">
			<div class="row">
                   
                <?php foreach($kategori as $row):?> 
				<div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="<?php echo base_url('images/upload/'.$row['gambar']) ?>" alt="IMG-BANNER">

						<a href="<?=base_url('web')?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?= $row['nama_kategori'];?>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
                <?php endforeach;?>   
			</div>
		</div>
	</div>

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-130">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5 text-center">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52 text-center">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
						All Products
					</button>
				</div>
			</div>
			<!-- login --><!-- add keranjang -->
			
			<div class="row isotope-grid">
				<?php 
					$total_berat = 0;
				?>
				<?php foreach($produk as $row): $kodeproduk = $row['kode_produk']?> 
				 <?= form_open("pesanan/add") ;
					echo form_hidden('id', $row['kode_produk']);
					echo form_hidden('price', $row['harga']);
					echo form_hidden('name', $row['nama_produk']);
					echo form_hidden('gambar', $row['gambar']);
				 ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item" style="float:left;">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo base_url('images/upload/'.$row['gambar']) ?>" alt="IMG-PRODUCT">
							<button type="submit" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" >Add to Cart</button>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $row['nama_produk'];?>
								</a>

								<span class="stext-105 cl3">
									<?= rupiah($row['harga']);?>
								</span>

								<span class="stext-105 cl3">
									Stok : <?= $row['stok'];?>
								</span>

							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="<?=base_url()?>/website/images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?=base_url()?>/website/images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
			</form>
			<?php endforeach;?>  
		</div>
			<!-- Pagination -->
			<div class="flex-c-m flex-w w-full p-t-38" style="clear:both;">
				<a href="" class="flex-c-m trans-04">
					<?php echo $pager->links('group1');?>
				</a>
			</div>
		</div>
</section>
<?= $this->endSection() ?>