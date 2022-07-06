<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<title>Penjualan || UMKM Puri Utami</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penjualan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
              <li class="breadcrumb-item active">Penjualan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="section">
        <div class="container-fluid">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= site_url('penjualan/inputJual') ?>" class="btn btn-sm btn-primary" id="tmbh"><i class="fas fa-plus"></i> Tambah Penjualan</a>
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
      
      <br>
      <br>
      <div class="table-responsive">
      <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>ID Penjualan</th>
              <th>Waktu</th>
              <th>ID Pelanggan</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
                <?php
                    foreach($penjualan as $row):
                        ?>
                            <tr>
                              <td><?= $row->id_penjualan?></td>
                                <td><?= substr($row->tanggal,0,10);?></td>
                                <td><?= $row->nama_pelanggan;?></td>
                                <td><?= rupiah($row->total);?></td>
                                <td>                                  
                                  <button onclick="modalDetail('<?= $row->id_penjualan ?>')" type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                                    <span data-feather="info"></span> Lihat Detail
                                </button>
                              </td>
                              </tr>
                        <?php
                    endforeach;    
                ?>
          </tbody>
        </table>
      </div>

      <p>



    </main>
  </div>
</div>


<!-- Modals -->     

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>



     

<script>
          function deleteConfirm(url){
              url2 = "<?= base_url('penjualan/ListPenjualan') ?>"; //diisi dengan halaman ini
              
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

              var myModal = new bootstrap.Modal(document.getElementById('deletePenjualan'), {  keyboard: false });
              
              myModal.show();
            
          }
      </script>
      <!-- Logout Delete Confirmation-->
      <div class="modal fade" id="deletePenjualan" tabindex="-1" role="dialog" aria-labelledby="examplePenjualanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="examplePenjualanLabel">Apakah anda yakin?</h5>
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

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detail-transaksi"> 
        <h6 id="nama-pelanggan">Nama Pelanggan: Wisnu</h6>
        <h6 id="tanggal">Tanggal: 12-02-2022</h6>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga</th>
              <th scope="col">Jumlah</th>
            </tr>
          </thead>
          <tbody id="tabel-penjualan">
          </tbody>
        </table>
        <h5 class="text-right r-10" id="harga"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="print()">Print</button>
      </div>
    </div>
  </div>
</div>
<script>

function modalDetail(id_penjualan){
  var base_url = window.location.origin
  const nama = document.getElementById('nama-pelanggan')
  const tanggal = document.getElementById('tanggal')
  const tabel = document.getElementById('tabel-penjualan')
  const harga = document.getElementById('harga')
  console.log(base_url)
  fetch(`${base_url}/modaldetail?id_penjualan=${id_penjualan}`)
  .then(response => response.json())
  .then(data => {
    data_tanggal = data.tanggal.split('-')
    data_tanggal = data_tanggal[2] + '-' + data_tanggal[1] + '-' + data_tanggal[0]
    nama.innerHTML = `Nama Pelanggan: ${data.nama_pelanggan}`
    tanggal.innerHTML = `Tanggal: ${data_tanggal}`
    harga.innerHTML = `Total: ${data.total} &ensp;`
    tabel.innerHTML = ''
    data.listPenjualan.forEach(function(item, index){
      tabel.innerHTML += `
        <tr>
          <th scope="row">${index+1}</th>
          <td>${item.nama_produk}</td>
          <td>${item.harga}</td>
          <td>${item.jumlah}</td>
        </tr>
      `
    })
  })
}
</script>
<script>
  function print(){
// Choose the element that our invoice is rendered in.
      var doc = new jsPDF();
      var elem = document.getElementById('detail-transaksi');
      elem.getElementsByTagName('h5')[0].classList.remove('text-right')
      console.log(elem)
      var res = doc.autoPrint();
      doc.fromHTML(elem, 15, 15, {
          'width': 1000,
      });
      doc.save('invoice.pdf');
      elem.getElementsByTagName('h5')[0].classList.add('text-right')
  }
</script>
<?= $this->endSection() ?>
