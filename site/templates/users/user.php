<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['nama_depan'].' '.$data['nama_belakang']; ?></title>
    <?php require_once dirname(__FILE__).'/../includeCSS.php'; ?>
  </head>
  <body>
    <?php require_once dirname(__FILE__).'/../navbar.php'; ?>
    <section class="profile">
      <div class="container">
        <div class="row">
          <div class="col-md-12 profile-user">
            <div class="row">
              <div class="col-md-3 profile-pictures">

                <?php if (!empty($data['gambar'])) {
    $gambar = APP_URL.'assets/images/'.$data['gambar'];
} else {
    $gambar = APP_URL.'assets/images/default-picture.png';
} ?>
                <img class="img-responsive img-center" src="<?php echo $gambar; ?>">
              </div>
              <div class="col-md-9 profile-details">
                <h3><?php echo $data['nama_depan'].' '.$data['nama_belakang']; ?></h3>
                <div class="row">
                  <div class="col-md-12">
                    <p class="biografi text-justify"><?php if (!empty($data['biografi'])) {
    echo $data['biografi'];
} ?></p>
                    <p><?php if (!empty($data['alamat'])) {
    echo "<span class='glyphicon glyphicon-home'></span> : ".$data['alamat'];
} ?></p>
                    <p><?php if (!empty($data['telepon'])) {
    echo "<span class='glyphicon glyphicon-phone'></span> : ".$data['telepon'];
} ?></p>
                    <p><?php if (!empty($data['email'])) {
    echo "<span class='glyphicon glyphicon-envelope'></span> : ".$data['email'];
} ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php require_once dirname(__FILE__).'/../footer.php'; ?>
    <?php require_once dirname(__FILE__).'/../includeJS.php'; ?>
  </body>
</html>
