<div class="modal fade" tabindex="-1" role="dialog" id="file">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Paper</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo APP_URL.'dashboard/paper'; ?>" class="dropzone" id="update-file"></form>
        <input type="hidden" id="file-id" />
      </div>
      <div class="modal-footer">
        <button id="close-update-file" type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button id="submit-update-file" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
