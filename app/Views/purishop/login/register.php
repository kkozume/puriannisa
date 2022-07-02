
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Puri Utami Shop | Registration</title>
  <link rel="icon" href="<?= base_url('images/puri_utami.png') ?>" type="image/gif" sizes="16x16">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/template/dist/css/adminlte.min.css">
</head>
<br>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= site_url('Login/register') ?>" class="h1"><b>Puri Utami</b>&nbsp;Shop</a>
    </div>
    <div class="card-body">
      <h3 class="login-box-msg">Register</h3>

       <?= form_open('Login/register') ?>
       <div class="form-group">
            <input type="hidden" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= isset($_SESSION['id_pelanggan']) ? $_SESSION['id_pelanggan'] : '';?>" readonly>
        </div>
        <div class="input-group mb-3">
             <?php
                if(isset($validation)){
                    //untuk mengecek apakah ada error pada elemen field namakosan
                    if ( $validation->hasError('nama_pelanggan') )
                    { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error: <?=$validation->getError('nama_pelanggan')?> </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                    }
                }
            ?>
            <br>
          <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <select class="form-control custom-select" aria-label="Default select example" name="jenis_kelamin" value="<?set_value('jenis_kelamin')?>">
                <option selected disabled value="" >-isi pilihan-</option>
                <option value="Laki-laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-venus-mars"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <?php
            if(isset($validation)){
                //untuk mengecek apakah ada error pada elemen field namakosan
                if ( $validation->hasError('no_telp') )
                { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error: <?=$validation->getError('no_telp')?> </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                }
            }
        ?>
        <br>
            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Nomer Telepon">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-phone"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <?php
                if(isset($validation)){
                    //untuk mengecek apakah ada error pada elemen field namakosan
                    if ( $validation->hasError('username') )
                    { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error: <?=$validation->getError('username')?> </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                    }
                }
            ?>
           <input id="InputUsername" type="text" class="form-control" name="username" value="" tabindex="1" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <?php
                if(isset($validation)){
                    //untuk mengecek apakah ada error pada elemen field namakosan
                    if ( $validation->hasError('pwd') )
                    { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error: <?=$validation->getError('pwd')?> </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                    }
                }
            ?>
          <input id="InputPassword" type="password" class="form-control" name="pwd" tabindex="2" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="hidden" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
          <!-- <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-house-user"></span>
            </div>
          </div> -->
        </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?=base_url()?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/template/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Jquery masking -->
<script src="<?= base_url()?>/jquery/jquery.mask.js"></script>
<script src="<?= base_url()?>/jquery/jquery.mask.min.js"></script>
<script>
    $(document).ready(function(){
        // Format mata uang.
        $('#no_telp').mask('000-000-000-000', {reverse: true});         
        
    })
  </script>
</body>
</html>
