<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['judul']; ?></title>
    <?php require_once dirname(__FILE__).'/../includeCSS.php'; ?>
  </head>
  <body>
    <?php require_once dirname(__FILE__).'/../navbar.php'; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h2><?php echo $data['judul']; ?></h2>
          oleh <a href="<?php echo APP_URL.'user/'.$data['url']; ?>"><?php echo $data['nama_depan'].' '.$data['nama_belakang']; ?></a>
          <hr />
        </div>
        <div class="col-md-12">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo APP_URL ?>assets/js/pdfjs/web/viewer.html?file=<?php echo APP_URL.'assets/documents/'.$data['file']; ?>"></iframe>
          </div>
        </div>
      </div>
    </div>
    <?php require_once dirname(__FILE__).'/../footer.php'; ?>
    <?php require_once dirname(__FILE__).'/../includeJS.php'; ?>
    <script src="<?php echo APP_URL ?>assets/js/pdfjs/build/pdf.js"></script>
  </body>
</html>
