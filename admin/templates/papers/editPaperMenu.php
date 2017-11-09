<button class="list-group-item" data-toggle="modal" data-target="#judul<?php echo $paper['id']; ?>">
  <strong>Judul</strong>
  <p class="list-group-item-text">
    Update judul
  </p>
</button>
<button class="list-group-item" data-toggle="modal" data-target="#deskripsi<?php echo $paper['id']; ?>">
  <strong>Deskripsi</strong>
  <p class="list-group-item-text">Update deskripsi karya ilmiah</p>
</button>
<button class="list-group-item" data-toggle="modal" data-target="#pengarang<?php echo $paper['id']; ?>">
  <strong>Pengarang</strong>
  <p class="list-group-item-text">Update pengarang karya ilmiah</p>
</button>
<button class="list-group-item" data-toggle="modal" data-target="#tahun<?php echo $paper['id']; ?>">
  <strong>Tahun</strong>
  <p class="list-group-item-text">Update tahun dibuat</p>
</button>
<button class="list-group-item" data-toggle="modal" data-target="#pembimbing<?php echo $paper['id']; ?>">
  <strong>Pembimbing</strong>
  <p class="list-group-item-text">Update pembimbing karya ilmiah</p>
</button>
<button class="list-group-item" data-toggle="modal" data-target="#jurusan<?php echo $paper['id']; ?>">
  <strong>Jurusan</strong>
  <p class="list-group-item-text">Update jurusan</p>
</button>
<button class="list-group-item" data-toggle="modal" data-target="#file" onclick="setFileId(<?php echo $paper['id']; ?>)">
  <strong>Paper</strong>
  <p class="list-group-item-text">Update paper</p>
</button>
