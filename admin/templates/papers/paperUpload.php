<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Karya Ilmiah</title>
    <?php require_once dirname(__FILE__).'/../includeCSS.php'; ?>
    <link href="<?php echo APP_URL ?>assets/css/dropzone.min.css" rel="stylesheet" />
  </head>
  <body>
    <?php require_once dirname(__FILE__).'/../navbar.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
          <div class="upload-paper text-center">
            <?php require_once dirname(__FILE__).'/paperError.php'; ?>
            <?php require_once dirname(__FILE__).'/paperSuccess.php'; ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Upload Karya Ilmiah</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="form-group">
                      <input type="text" id="judul" placeholder="Judul" class="form-control">
                    </div>
                    <div class="form-group">
                      <textarea id="deskripsi" class="form-control" rows="3" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="text" id="pengarang" placeholder="Pengarang" class="form-control">
                    </div>
                    <div class="form-group">
                      <select id="tahun" class="form-control">
                        <?php
                          $tanggal = date('Y');
                          for ($i = 1980; $i <= $tanggal; ++$i) {
                              echo '<option>'.$i.'</option>';
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" id="pembimbing" placeholder="Pembimbing" class="form-control">
                    </div>
                    <div class="form-group">
                      <select id="jurusan" class="form-control">
                        <option>Teknik Mesin</option>
                        <option>Teknik Elektro</option>
                        <option>Teknik Industri</option>
                        <option>Teknik Kimia</option>
                        <option>Teknik Informatika</option>
                        <option>Lain-lain</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <form action="<?php echo APP_URL.'dashboard/paper'; ?>" class="dropzone" id="upload-paper"></form>
                  </div>
                </div>
              </div>
              <div class="panel-footer text-right">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button id="submit-paper" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require_once dirname(__FILE__).'/../footer.php'; ?>
    <?php require_once dirname(__FILE__).'/../includeJS.php'; ?>
    <script src="<?php echo APP_URL ?>assets/js/bootbox.min.js"></script>
    <script src="<?php echo APP_URL ?>assets/js/dropzone.min.js"></script>
    <script src="<?php echo APP_URL ?>assets/js/admin/paper.js"></script>
  </body>
</html>
