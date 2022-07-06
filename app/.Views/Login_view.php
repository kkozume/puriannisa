<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

  
  </head>
  <body> 
    <div class="container mt-5 col-5">
      <div class="card">
          <div class="card-header bg-primary text-white">
            LOGIN    
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <?php if(session()->getFlashdata('error')) {?>
                <div class="alert alert-danger">
                  <?php echo session()->getFlashdata('error') ?>
                </div>
                <?php } ?>
                <div class="mb-3">
                <label for="inputUsername" class="form-label">
                  Username
                </label>
                <input type="text" name="username" class="form-control" value="<?php echo session()->getFlashdata('username')?>" id="inputUsername" placeholder="Masukkan username">
                </div>

                <div class="mb-3">
                <label for="inputPassword" class="form-label">
                  Password
                </label>
                <input type="password" name="pwd" class="form-control" id="inputPassword" placeholder="Masukkan password">
                </div>

                <div class="mb-3">
                  <input type="submit" name="login" class="btn btn-primary" value="Login">
                </div>
              </div>
          </form> 
      </div>
    </div>

  </body>
</html>
