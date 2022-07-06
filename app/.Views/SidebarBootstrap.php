<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color:  #ccf3ff;">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span data-feather="database"></span>
            Master Data
            </a>
            <ul class="dropdown-menu" style="background-color:  #99e7ff;" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= base_url('akun/daftarakun') ?>">Akun</a></li>
              <li><a class="dropdown-item" href="<?= base_url('Kategori/Daftarkategori') ?>">Kategori</a></li>
              <li><a class="dropdown-item" href="<?= base_url('produk/daftarproduk') ?>">Produk</a></li>
              <li><a class="dropdown-item" href="<?= base_url('karyawan/daftarkaryawan') ?>">Karyawan</a></li>
              <li><a class="dropdown-item" href="<?= base_url('supplier/daftarsupplier') ?>">Supplier</a></li>
              <li><a class="dropdown-item" href="<?= base_url('bahan_baku/daftarbahan') ?>">Bahan Baku</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="shopping-cart"></span>
              Transaksi
            </a>
            <ul class="dropdown-menu" style="background-color:  #99e7ff;" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('target_produksi/daftartargetprod') ?>">Target Produksi</a></li>
              <li><a class="dropdown-item" href="<?= base_url('pembelian/Listpembelian') ?>">Pembelian Bahan Baku</a></li>
              <li><a class="dropdown-item" href="<?= base_url('penjualan/ListPenjualan') ?>">Penjualan</a></li>
              <li><a class="dropdown-item" href="<?= base_url('pembebanan/ListBeban') ?>">Pembebanan</a></li>
              <li><a class="dropdown-item" href="<?= base_url('absen/listabsen') ?>">Data Kehadiran</a></li>
              <li><a class="dropdown-item" href="<?= base_url('pembayaran/listpembayaran') ?>">Pembayaran Gaji</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="users"></span>
              Laporan
            </a>
            <ul class="dropdown-menu" style="background-color:  #99e7ff;" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= base_url('Laporan/jurnalumum') ?>">Jurnal Umum</a></li>
              <li><a class="dropdown-item" href="<?= base_url('Laporan/bukubesar') ?>">Buku Besar</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Grafik
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Analisis Data
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>