<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Produk || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="section">
        <div class="container-fluid">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= site_url('produk/index') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Data Produk</a>
            </div>
            </div>
                <!-- Default box -->
            <div class="card shadow mb-4">
                <div class="card-header">
                <?php if(session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                           <i class="fas fa-check-circle"></i>
                            <?=session()->getFlashdata('success')?>
                        </div>
                    </div>
                <?php endif; ?>
      <h2>Data Produk</h2>
      <div class="table-responsive">
      <table kode_produk="example" class="table table-striped" style="wkode_produkth:100%">
          <thead>
            <tr>
              <th>Kode Produk</th>
              <th>Nama Produk</th>
              <th>Stok</th>
              <th>Harga Produk</th>
              <th>Kode Kategori</th>
              <th>kode_produk Supplier</th>
              <th>kode_produk Karyawan</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
                <?php
                //print_r($produk);
                    foreach($produk as $row):
                        ?>
                            <tr>
                                <td><?//= $row['kode_produk'];?></td>
                                <td><?= $row['kode_produk'];?></td>
                                <td><?= $row['nama_produk'];?></td>
                                <td><?= $row['stok'];?></td>
                                <td><?= rupiah($row['harga_jual_produk']);?></td>
                                <td><?= $row['berat'];?></td>
                                <td>
                                  <a href="<?php echo base_url('images/upload/'.$row['gambar']) ?>" target="_blank">
                                  <img src="<?php echo base_url('images/upload/'.$row['gambar']) ?>" class="img-thumbnail" wkode_produkth="100">
                                  </a>
                                </td>
                                <td>
                                  <a class="btn btn-success btn-sm" href="<?= base_url('produk/editproduk/'.$row['kode_produk']) ?>" role="button">
                                    <span data-feather="edit"></span>Ubah
                                  </a>
                                  <a onclick="deleteConfirm('<?php echo base_url('produk/deleteproduk/'.$row['kode_produk']) ?>')" class="btn btn-danger btn-sm" href="#" role="button">
                                    <span data-feather="trash-2"></span>Hapus
                                  </a>
                                </td>
                            </tr>
                        <?php
                    endforeach;    
                ?>
          </tbody>
        </table>
      </div>           
    </main>
  </div>
</div>

<!-- Modals -->     

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>



      <script>
          function deleteConfirm(url){
              url2 = "<?= base_url('produk/daftarproduk') ?>"; //diisi dengan halaman ini
              
              var tomboldelete = document.getElementBykode_produk('btn-delete')  
              tomboldelete.setAttribute("href", url); //akan meload kontroller delete

              var pesan = "Data dengan kode_produk <b>"
              var pesan2 = " </b>akan dihapus"
              var n = url.lastIndexOf("/")
              var res = url.substring(n+1);
              document.getElementBykode_produk("xkode_produk").innerHTML = pesan.concat(res,pesan2);

              var myModal = new bootstrap.Modal(document.getElementBykode_produk('deleteModal'), {  keyboard: false });
              
              myModal.show();
            
          }
      </script>
      <!-- Logout Delete Confirmation-->
      <div class="modal fade" kode_produk="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hkode_produkden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" kode_produk="exampleModalLabel">Apakah anda yakin?</h5>
              <a kode_produk="btn-tutup" class="btn btn-secondary" data-bs-dismiss="modal">X</a>
            </div>
            <div class="modal-body" kode_produk="xkode_produk"></div>
            <div class="modal-footer">
              <a kode_produk="btn-batal" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</a>
              <a kode_produk="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
          </div>
        </div>
      </div>    



    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="<?= base_url('dashboard/dashboard.js') ?>"></script>
  
      <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
            
    </script>
  
  </body>
</html>

<!-- /.container-fluid -->
    </div>
    <!-- /.card -->
</section>
<?= $this->endSection() ?>