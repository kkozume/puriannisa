<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Buku Besar || UMKM Puri Utami</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Buku Besar</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a></li>
          <li class="breadcrumb-item active">Buku Besar</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="section">
 
    <div class="card shadow mb-4">
      <!-- DataTales Example -->
      <div class="card-header py-3">
        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">x</button>
              <i class="fas fa-check-circle"></i>
              <?= session()->getFlashdata('success') ?>
            </div>
          </div>
        <?php endif; ?>
        <h3 class=" card-title m-0 font-weight-bold">Buku Besar</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="example2" width="100%" cellspacing="0">

      <?php
        if(isset($validation)){
          echo $validation->listErrors();
        }
        //echo $idkos;
      ?>
        <div class="row">
        <form action="<?= base_url('laporan/lihatbukubesar') ?>" method="post">
            
              
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                        <select class="form-select" aria-label="Default select example" name="tahun" id="tahun">
                            <?php
                                foreach($tahun as $row):
                                    $tahun = $row->tahun;
                                    ?>
                                        <option value="<?=$tahun?>"><?=$tahun?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                </div>
                <div id="x"></div>
                <div class="mb-3">
                    <label for="akun" class="form-label">Akun</label>
                        <select class="form-select" aria-label="Default select example" name="akun" id="akun">
                            <?php
                                foreach($nama_akun as $row): //b.kode_akun, a.nama_akun
                                    $kode_akun = $row->kode_akun;
                                    $nama_akun = $row->nama_akun;
                                    ?>
                                        <option value="<?=$kode_akun."|".$nama_akun?>"><?=$nama_akun?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

     
    </main>
  </div>
</div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="<?= base_url('dashboard/dashboard.js') ?>"></script>


     <!-- untuk jquery AJAX -->
     <script>
            $(document).ready(function() {
                $('#tahun').change(function(){
                var tahun = document.getElementById("tahun").value;
                //jadinya akses json ke alamat url http://localhost:8080/laporan/listbulan/2021
                var var_url = "<?=base_url('Laporan/listbulan')?>"+"/"+tahun; 
                $.ajax({
                    url: var_url,
                    dataType: "json",
                    async : true,
                    success: function(data){
                    try{  
                        var teks = '<div class="mb-3">';
                        teks += '<label for="bulan" class="form-label">Bulan</label>';
                        teks += '<select class="form-select" aria-label="Default select example" name="bulan" id="bulan">';
                        for(i=0; i<data.length; i++){
                            teks += "<option value='"+data[i].bulan_angka+"'>"+data[i].bulan+"</option>";
                        }
                        teks = teks + "</div>";
                        document.getElementById("x").innerHTML = teks;
                    }catch(e) {  
                        alert('Exception while request..');
                    }   
                    }
                });
                });
            });
    </script>
     <!-- akhir jquery AJAX -->   

  </body>
</html>

</section>
<?= $this->endSection() ?>