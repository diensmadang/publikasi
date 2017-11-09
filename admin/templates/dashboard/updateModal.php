<div class="modal fade" tabindex="-1" role="dialog" id="nama">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Nama Profil</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="namaDepan">Nama Depan</label>
          <input type="text" class="form-control" id="nama_depan" value="<?php echo $data['nama_depan']; ?>">
        </div>
        <div class="form-group">
          <label for="namaBelakang">Nama Belakang</label>
          <input type="text" class="form-control" id="nama_belakang" value="<?php echo $data['nama_belakang']; ?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updateNama();">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="foto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Foto Profil</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo APP_URL.'dashboard'; ?>" class="dropzone" id="upload-foto"></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button id="submit-foto" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="biografi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Biografi Profil</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <textarea class="form-control" rows="4" id="text-biografi"><?php if (isset($data['biografi'])) {
    echo $data['biografi'];
} ?></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updateBiografi();">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="kontak">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Kontak Profil</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" rows="4" id="text-alamat"><?php if (isset($data['alamat'])) {
    echo $data['alamat'];
} ?></textarea>
        </div>
        <div class="form-group">
          <label for="telepon">Telepon</label>
          <input type="text" class="form-control" id="telepon" value="<?php if (isset($data['telepon'])) {
    echo $data['telepon'];
} ?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updateKontak();">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="email">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Email</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="text-email" value="<?php echo $data['email']; ?>">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="text-email-password">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updateEmail();">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="password">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Password</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="passwordLama">Password Lama</label>
          <input type="password" class="form-control" id="text-password-lama">
        </div>
        <div class="form-group">
          <label for="password">Password Baru</label>
          <input type="password" class="form-control" id="text-password-baru">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" onclick="updatePassword();">Simpan</button>
      </div>
    </div>
  </div>
</div>
