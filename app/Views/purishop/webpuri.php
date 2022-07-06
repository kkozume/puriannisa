
<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->renderSection('title') ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="icon" type="image/gif" href="<?= base_url('images/puri_utami.png') ?>" sizes="16x16">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/website/css/main.css">
<!--===============================================================================================-->
 <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="<?=base_url()?>/website/images/icons/puriu2.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="<?= site_url('home/web') ?>">Home</a>
							</li>

							<li>
								<a href="<?= site_url('home/about') ?>">About</a>
							</li>

						</ul>
					</div>	

					<!-- Icon header -->
					<?php $keranjang = $cart->contents();
						$jml_item = 0;
						foreach ($keranjang as $key => $value) {
							$jml_item = $jml_item + $value['qty'];
						}
					?>
					<div class="wrap-icon-header flex-w flex-r-m h-full">							
						<div class="flex-c-m h-full p-r-25 bor6">
							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify=<?=$jml_item?>>
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</div>
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-account"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="<?=base_url()?>/website/index.html"><img src="<?=base_url()?>/website/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<?php $keranjang = $cart->contents();
				$jml_item = 0;
				foreach ($keranjang as $key => $value) {
					$jml_item = $jml_item + $value['qty'];
				}
			?>
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify=<?=$jml_item?>>
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>
			
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11">
						<i class="zmdi zmdi-account"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="<?=base_url('home/web')?>">Home</a>
				</li>

				<li>
					<a href="<?= site_url('home/about') ?>">About</a>
				</li>

			</ul>
		</div>
	</header>

	<!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w p-lr-65 js-pscroll">
				<ul class="sidebar-link">
					<li class="p-b-13">
						<a class="nav-link has-icon text-primary" href="" role="button">
							<i class="zmdi zmdi-account"></i> &nbsp;Novelia DAP
						</a>
					</li>
					<li class="p-b-13">
						<a class="nav-link has-icon text-primary" href="<?php echo site_url('penjualan/pembayaran')?>" role="button">
							<i class="zmdi zmdi-shopping-basket"></i> Lihat Pesanan
						</a>
					</li>
					<li class="p-b-13">
						<a class="nav-link has-icon text-danger" href="<?php echo site_url('Login/logout')?>" role="button">
							<i class="zmdi zmdi-tag-close"></i> Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
	</aside>


	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					KERANJANG KAMU
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			<?php if (empty($keranjang)) { ?>
				<div class="badge bg-primary text-wrap" style="width: 18rem;">
                        Keranjang Belanja Kosong.
                </div>
                <br>
					<!-- <p>Keranjang Belanja Kosong</p><br> -->
				</a>
			<?php }else { ?>
				<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<?php 
					$total_berat = 0;
					?>
					<?php foreach ($keranjang as $key => $value) { 
						$total_berat = $total_berat + ($value['qty'] * $value['options']['berat']);
					?>
						<li class="header-cart-item flex-w flex-t m-b-12">
							<div class="header-cart-item-img">
								<img src="<?= base_url('images/upload/'.$value['options']['gambar']); ?>" alt="IMG">
							</div>
							<div class="header-cart-item-txt p-t-8">
								<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
									<?= $value['name'];?>
								</a>
								<span class="header-cart-item-info">
									<?= $value['qty'];?> * <?= rupiah($value['price']);?> = <?= rupiah($value['subtotal']);?>
								</span>
							</div>
						</li>
				<!-- penutup foreach -->
				<?php } ?>
					</ul>
					<div class="w-full">
						<div class="header-cart-total w-full p-tb-40">
							Total: <?= rupiah($cart->total()) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $total_berat; ?> gram
						</div>
			<!-- penutup if else -->
			<?php } ?>
			
					<div class="header-cart-buttons flex-w w-full">
						<a href="<?=base_url('pesanan/viewcart')?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Lihat Keranjang
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
         <?= $this->renderSection('content') ?>
    </div>

   <!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Kategori
					</h4>

					<ul>
                        <?php foreach($kategori as $row):?> 
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								<?= $row['nama_kategori'];?>
							</a>
						</li>
                        <?php endforeach;?>   
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Halaman
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="<?= site_url('home/about') ?>" class="stext-107 cl7 hov-cl1 trans-04">
								Tentang Kami
							</a>
						</li>

						<!-- <li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Cara Berbelanja
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Pengiriman Barang
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Syarat dan Ketentuan
							</a>
						</li> -->
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						PURI UTAMI STORE
					</h4>

					<p class="text-justify stext-107 cl7 size-180">
						Toko online mukena terlengkap dan terpercaya. Dapatkan penawaran dengan kualitas terbaik. PuriUtami Store hadir untuk memenuhi kebutuhan Anda.
					</p>

					<div class="p-t-27">
                        <h6 class=" cl0">
                            Temukan kami di
                        </h6>
						<a href="https://www.facebook.com/Puri-Utami-Mukena-352707651996950/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="https://www.instagram.com/puriutami_mukena/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Ada Pertanyaan ?
					</h4>
                        <h6 class=" cl0">
                            Hubungi kami : 0818-880-547 /WA
                        </h6>
                        <br>
				</div>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
</div>
<?php 
	$total_berat = 0;
?>
<!--===============================================================================================-->	
	<script src="<?=base_url()?>/website/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>/website/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url()?>/website/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/vendor/slick/slick.min.js"></script>
	<script src="<?=base_url()?>/website/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/website/js/main.js"></script>
	
	
</body>
</html>

