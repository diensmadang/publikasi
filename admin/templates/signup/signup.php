<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar</title>
    <?php require_once dirname(__FILE__).'/../includeCSS.php'; ?>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
          <div class="signup text-center">
            <div class="row">
              <div class="col-xs-offset-4 col-xs-4">
                <img src="<?php echo APP_URL; ?>assets/images/logo-dm.png" alt="DM Publikasi" class="img-responsive">
              </div>
            </div>
            <hr>
            <div class="signupForm">
              <form method="post">
                <div class="row">
                  <div class="col-xs-12 col-md-6">
                    <div class="form-group <?php if (isset($error['nama_depan'])) {
    echo 'has-error';
} ?>">
                      <input type="text" name="nama_depan" placeholder="Nama Depan" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="form-group <?php if (isset($error['nama_belakang'])) {
    echo 'has-error';
} ?>">
                      <input type="text" name="nama_belakang" placeholder="Nama Belakang" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group <?php if (isset($error['email'])) {
    echo 'has-error';
} ?>">
                      <input type="email" name="email" placeholder="Email" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group <?php if (isset($error['password'])) {
    echo 'has-error';
} ?>">
                      <input type="password" name="password" placeholder="Password" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col-xs-12 text-left">
                    <?php require_once dirname(__FILE__).'/errorVerify.php'; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-offset-8 col-sm-4">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Daftar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <hr>
          <div class="text-center">
            Sudah punya akun? <a href="<?php echo APP_URL; ?>login">Login</a>
          </div>
        </div>
      </div>
    </div>
    <?php require_once dirname(__FILE__).'/../includeJS.php'; ?>
  </body>
</html>
