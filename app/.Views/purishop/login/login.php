<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Puri Utami Shop | Log in</title>
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
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= site_url('Login_pelanggan/login') ?>" class="h1"><b>Puri Utami</b>&nbsp;Shop</a>
    </div>
    <div class="card-body">
      <!-- <?php if(session()->getFlashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                  <button class="close" data-dismiss="alert">x</button>
                  <i class="fas fa-check-circle"></i>
                  <?=session()->getFlashdata('success')?>
              </div>
          </div>
        <?php endif; ?> -->
       <h3 class="login-box-msg">Login</h3>
      <div id="flashlogin" data-flashlogin="<?=session()->getFlashdata('success')?>"></div>
      <form method="POST" action="" >
        <?php if(session()->getFlashdata('error')) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <?php echo session()->getFlashdata('error')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <div class="input-group mb-3">
          <input id="InputUsername" type="text" class="form-control" name="username" value="<?php echo session()->getFlashdata('username')?>" tabindex="1" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
           <input id="InputPassword" type="password" class="form-control" name="pwd" tabindex="2" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="mb-3">
             <input type="submit" name="login" class="btn btn-primary btn-block text-center" value="Login" tabindex="4">
          </div>
          <div class="mb-3">
            <a href="<?= site_url('Login/register') ?>" class="btn btn-primary btn-block" id="regis"> Register</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- <script src="<?=base_url()?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<script src="<?=base_url()?>/template/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript">
		var flashlogin = $('#flashlogin').data('flashlogin');
		if(flashlogin) {
			Swal.fire({
			icon: 'success',
			title: 'Success',
			text: flashlogin,
		})
		}
	</script>
</body>
</html>
