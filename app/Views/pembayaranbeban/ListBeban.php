<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Karyawan || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pembayaran Beban</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Pembayaran Beban</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="section">
        <div class="container-fluid">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= site_url('pembebanan/index') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Data Beban</a>
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
      <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-body">
              <a href="<?= base_url('pembayaranbeban/inputBeban') ?>" class="btn btn-warning" id="tmbh">Tambah Beban</a>
              </div>
            </div>
        </div>
      </div> 
      <br>

      <div class="table-responsive">
      <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>#IdBeban</th>
              <th>Nama Beban</th>
              <th>Tanggal Transaksi</th>
              <th>Biaya</th>
              <th>Aksi
              </th>
            </tr>
          </thead>
          <tbody>
                <?php
                    foreach($pembayaranbeban as $row):
                        ?>
                            <tr>
                                <td><?= $row->id_transaksi?></td>
                                <td><?= $row->nama?></td>
                                <td><?= substr($row->waktu,0,10)?></td>
                                <td><?= rupiah($row->biaya)?></td>
                                <td><a onclick="deleteConfirm('<?php echo base_url('pembayaranbeban/deletepembayaranbeban/'.$row->id_transaksi) ?>')" href="#" class="btn btn-danger" role="button" aria-pressed="true">Hapus</a></td>
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
              url2 = "<?= base_url('pembayaranbeban/ListBeban') ?>"; //diisi dengan halaman ini
              
              var tomboldelete = document.getElementById('btn-delete')  
              tomboldelete.setAttribute("href", url); //akan meload kontroller delete

              var tomboldelete = document.getElementById('btn-batal')
              tomboldelete.setAttribute("href", url2); //akan meload halaman ini

              var tombolbatal = document.getElementById('btn-tutup')
              tombolbatal.setAttribute("href", url2); //akan meload halaman ini

              var pesan = "Data dengan ID <b>"
              var pesan2 = " </b>akan dihapus"
              var n = url.lastIndexOf("/")
              var res = url.substring(n+1);
              document.getElementById("xid").innerHTML = pesan.concat(res,pesan2);

              var myModal = new bootstrap.Modal(document.getElementById('deletepembayaranbeban'), {  keyboard: false });
              
              myModal.show();
            
          }
      </script>
      <!-- Logout Delete Confirmation-->
      <div class="modal fade" id="deletepembayaranbeban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
              <a id="btn-tutup" class="btn btn-secondary" href="#">X</a>
            </div>
            <div class="modal-body" id="xid"></div>
            <div class="modal-footer">
              <a id="btn-batal" class="btn btn-secondary" href="#">Batalkan</a>
              <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
          </div>
        </div>
      </div>  

<!-- Bootstrap JS -->
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
