<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <?php require_once dirname(__FILE__).'/../includeCSS.php'; ?>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          <div class="signup text-center">
            <div class="row">
              <div class="col-xs-offset-3 col-xs-6">
                <img src="<?php echo APP_URL; ?>assets/images/logo-dm.png" alt="DM Publikasi" class="img-responsive">
              </div>
            </div>
            <hr>
            <div class="signupForm">
              <form method="post">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <input type="email" name="email" placeholder="Email" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group">
                      <input type="password" name="password" placeholder="Password" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col-xs-12 text-left">
                    <?php require_once dirname(__FILE__).'/errorVerify.php'; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-offset-8 col-sm-4">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <hr>
          <div class="text-center">
            Belum punya akun? <a href="<?php echo APP_URL; ?>signup">Daftar</a>
          </div>
        </div>
      </div>
    </div>
    <?php require_once dirname(__FILE__).'/../includeJS.php'; ?>
  </body>
</html>
