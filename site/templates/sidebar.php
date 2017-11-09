<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Tahun</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <?php
      $daftarTahun = $data['tahun'];
      $banyakTahun = count($daftarTahun);
      $kiri = "";
      $kanan = "";
      for($i = 0; $i < $banyakTahun; $i++) {
        $tahun = $daftarTahun[$i]['tahun'];
        if ($i >= ($banyakTahun/2)) {
          $kanan.="<a href='".APP_URL."search/tahun/$tahun' class='list-group-item list-group-item-success'>$tahun</a>";
        } else {
          $kiri.="<a href='".APP_URL."search/tahun/$tahun' class='list-group-item list-group-item-success'>$tahun</a>";
        }
      }
    ?>
      <div class="col-md-6">
        <div class="list-group">
          <?php echo $kiri; ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="list-group">
          <?php echo $kanan; ?>
        </div>
      </div>
    </div>
  </div>
</div>
   <!--
<div class="panel panel-primary">
  <div class="panel-heading">
 <h3 class="panel-title">Pembimbing</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <?php
  //    $daftarPembimbing = $data['pembimbing'];
  //    $banyakPembimbing = count($daftarPembimbing);
  //    $kiri = "";
  //    $kanan = "";
  //    for($i = 0; $i < $banyakPembimbing; $i++) {
 //       $pembimbing = $daftarPembimbing[$i]['pembimbing'];
 //       if ($i >= ($banyakPembimbing/2)) {
 //         $kanan.="<a href='".APP_URL."search/pembimbing/$pembimbing' class='list-group-item list-group-item-info'>$pembimbing</a>";
 //       } else {
 //         $kiri.="<a href='".APP_URL."search/pembimbing/$pembimbing' class='list-group-item list-group-item-info'>$pembimbing</a>";
 //       }
  //    }
    ?>
      <div class="col-md-6">
        <div class="list-group">
          <?php echo $kiri; ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="list-group">
          <?php echo $kanan; ?>
        </div>
      </div>
    </div>
  </div>
</div>-->

<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Taq</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    <?php
      $daftarJurusan = $data['jurusan'];
      $banyakJurusan = count($daftarJurusan);
      $kiri = "";
      $kanan = "";
      for($i = 0; $i < $banyakJurusan; $i++) {
        $jurusan = $daftarJurusan[$i]['jurusan'];
        if ($i >= ($banyakJurusan/2)) {
          $kanan.="<a href='".APP_URL."search/jurusan/$jurusan' class='list-group-item list-group-item-warning'>$jurusan</a>";
        } else {
          $kiri.="<a href='".APP_URL."search/jurusan/$jurusan' class='list-group-item list-group-item-warning'>$jurusan</a>";
        }
      }
    ?>
      <div class="col-md-6">
        <div class="list-group">
          <?php echo $kiri; ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="list-group">
          <?php echo $kanan; ?>
        </div>
      </div>
    </div>
  </div>
</div>
