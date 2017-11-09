<div class="modal fade" tabindex="-1" role="dialog" id="judul<?php echo $paper['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Judul</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control input-lg" value="<?php echo $paper['judul']; ?>" id="judul<?php echo $paper['id']; ?>value">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updateJudul(<?php echo $paper['id']; ?>);">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deskripsi<?php echo $paper['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Deskripsi</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <textarea class="form-control" rows="4" id="deskripsi<?php echo $paper['id']; ?>value"><?php if (isset($paper['deskripsi'])) {
    echo $paper['deskripsi'];
} ?></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updateDeskripsi(<?php echo $paper['id']; ?>);">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="pengarang<?php echo $paper['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Pengarang</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control input-lg" value="<?php if(isset($paper['pengarang'])) echo $paper['pengarang']; ?>" id="pengarang<?php echo $paper['id']; ?>value">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updatePengarang(<?php echo $paper['id']; ?>);">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="tahun<?php echo $paper['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Tahun</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <select id="tahun<?php echo $paper['id']; ?>value" class="form-control">
            <?php
              $tanggal = date('Y');
              for ($j = 1980; $j <= $tanggal; ++$j) {
                if(isset($paper['tahun']) && $paper['tahun'] == $j) {
                  echo '<option selected="selected">'.$j.'</option>';
                } else {
                  echo '<option>'.$j.'</option>';
                }
              }
            ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updateTahun(<?php echo $paper['id']; ?>);">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="pembimbing<?php echo $paper['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Pembimbing</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control input-lg" value="<?php if(isset($paper['pembimbing'])) echo $paper['pembimbing']; ?>" id="pembimbing<?php echo $paper['id']; ?>value">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updatePembimbing(<?php echo $paper['id']; ?>);">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="jurusan<?php echo $paper['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Jurusan</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <?php
            $jurusan = array('Teknik Mesin', 'Teknik Elektro', 'Teknik Industri', 'Teknik Kimia', 'Teknik Informatika', 'Lain-lain');
           ?>
          <select id="jurusan<?php echo $paper['id']; ?>value" class="form-control">
            <?php
            for ($j = 0; $j < count($jurusan); $j++) {
              if(isset($paper['jurusan']) && $paper['jurusan'] == $jurusan[$j]) {
                echo '<option selected="selected">'.$jurusan[$j].'</option>';
              } else {
                echo '<option>'.$jurusan[$j].'</option>';
              }
            }
             ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updateJurusan(<?php echo $paper['id']; ?>);">Simpan</button>
      </div>
    </div>
  </div>
</div>
