<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><a href="<?php echo APP_URL.'paper/'.$paper['id'];?>"><?php echo $paper['judul']; ?></a></h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-3" style="margin-bottom:20px;">
        <?php
          if (file_exists(UPLOAD_DOCUMENT_FOLDER.str_replace('.pdf','.png',$paper['file']))) {
            $image = APP_URL.'assets/documents/'.str_replace('.pdf','.png',$paper['file']);
          } else {
            $image = APP_URL.'assets/images/default-pdf.png';
          }
        ?>
        <img class="img-responsive img-center" src="<?php echo $image; ?>" alt="<?php echo $paper['judul']; ?>">
      </div>
      <div class="col-md-8">
        <dl class="dl-horizontal">
          <dt>Judul</dt>
          <dd><?php echo $paper['judul']; ?></dd>
          <dt>Deskripsi</dt>
          <dd>
            <?php
              if(!empty($paper['deskripsi'])) echo $paper['deskripsi'];
              else echo "-";
            ?>
          </dd>
          <dt>Pengarang</dt>
          <dd>
            <?php
              if(!empty($paper['pengarang'])) echo $paper['pengarang'];
              else echo "-";
            ?>
          </dd>
          <dt>Tahun</dt>
          <dd>
            <?php if(!empty($paper['tahun'])) echo $paper['tahun']; ?>
          </dd>
          <dt>Pembimbing</dt>
          <dd>
            <?php
              if(!empty($paper['pembimbing'])) echo $paper['pembimbing'];
              else echo "-";
            ?>
          </dd>
          <dt>Jurusan</dt>
          <dd>
            <?php
              if(!empty($paper['jurusan'])) echo $paper['jurusan'];
              else echo "-";
            ?>
          </dd>
        </dl>
        <a href="<?php echo APP_URL.'paper/'.$paper['id'];?>" class="btn btn-success">Baca</a> oleh
        <a href="<?php echo APP_URL.'user/'.$paper['url'];?>"><?php echo $paper['nama_depan'].' '.$paper['nama_belakang']; ?></a>
      </div>
    </div>
  </div>
</div>
