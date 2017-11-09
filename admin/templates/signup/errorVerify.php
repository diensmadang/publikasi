<?php if (isset($error['nama_depan']) || isset($error['nama_belakang'])) {
    ?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Nama hanya boleh (a-Z), angka dan spasi.
</div>
<?php

} ?>

<?php
  if (isset($error['email'])) {
      if ($error['email'] == 'Email sudah digunakan') {
          ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Email sudah digunakan.
    </div>
<?php

      } else {
          ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Email tidak valid.
    </div>
<?php

      }
  }
?>

<?php if (isset($error['password'])) {
    ?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Password hanya boleh (a-Z), angka dan (_).
</div>
<?php

}?>
