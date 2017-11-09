<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['nama_depan'].' '.$data['nama_belakang']; ?> | Dashboard</title>
    <?php require_once dirname(__FILE__).'/../includeCSS.php'; ?>
    <link href="<?php echo APP_URL ?>assets/css/dropzone.min.css" rel="stylesheet" />
    <style>
      .popover-content {
        padding: 0px;
      }
      .list-group-item {
        border: none;
      }
      .list-group-item-text {
        min-width: 300px;
      }
    </style>
  </head>
  <body>
    <?php require_once dirname(__FILE__).'/../navbar.php'; ?>
    <?php require_once dirname(__FILE__).'/updateModal.php'; ?>
    <?php require_once dirname(__FILE__).'/errorModal.php'; ?>
    <?php require_once dirname(__FILE__).'/suksesModal.php'; ?>
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
                <img class="img-responsive img-center" src="<?php echo $gambar; ?>" onclick="toggleModal('#foto')">
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
                  <div class="col-md-12">
                    <a href="<?php echo APP_URL.'dashboard/paper/add'; ?>" class="btn btn-success"><span class="glyphicon glyphicon-file"></span> UPLOAD</a>
                    <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom"
                    data-content='<?php require_once dirname(__FILE__).'/editProfileMenu.php'; ?>' data-trigger="focus">
                      <span class="glyphicon glyphicon-pencil"> EDIT</span>
                    </button>
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
    <script src="<?php echo APP_URL ?>assets/js/dropzone.min.js"></script>
    <script src="<?php echo APP_URL ?>assets/js/admin/dashboard.js"></script>
  </body>
</html>
