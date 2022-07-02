 <!-- Brand Logo -->
    <a href="<?= site_url('home') ?>" class="brand-link">
      <img src="<?= base_url('images/puri_utami.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UMKM Puri Utami</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>/images/user2.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Annisa Ardillah</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" name="keyword" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar" type="submit" name="submit">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="<?= site_url('home') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link ">
               <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('akun/daftarakun') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                  <p>COA</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= base_url('kategori/daftarkategori') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('produk/daftarproduk') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pelanggan/daftarpelanggan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pelanggan</p>
                </a>
              </li>            
            </ul>
          </li>
        
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('penjualan/ListJual')?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('pembebanan/ListBeban')?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembayaran Beban</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('Laporan/jurnalumum')?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/bukubesar') ?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Besar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/neracasaldo') ?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Neraca Saldo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan/labarugi') ?>" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan laba/rugi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">SETTING</li>
           <li class="nav-item ">
            <a href="<?= base_url('setting_puri/daftarsetting') ?>" class="nav-link ">
              <i class="fas fa-cog"></i>
              <p>Pengaturan Lokasi</p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->