<div class="modal fade" id="update_announcement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Update Announcement</h4>
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="../../process/admin/announcement_update.php"  enctype="multipart/form-data" method="POST">
             <input type="hidden" name="id_announcement_update" id="id_announcement_update" class="form-control">
            <div class="row">
              <div class="col-12">
                <img src="" id="preview_announce_img" width="470px" height="300px">
              </div>

              <div class="col-12">
                <label>File:</label>
                    <input type="file" name="files_update[]" id ="files_update" class="form-control-lg" accept="image/png, image/gif, image/jpeg" required>
              </div>
            </div>
            <br>
            <div class="row">
               <div class="col-6">
                    <label>Description:</label><br>
                    <input type="text" name="description_announcement_update[]" id="description_announcement_update" class="form-control">
                     
              </div>
              <div class="col-6">
                  <label>Announcement Date:</label>
                  <input type="date" name="date_announce_update" id="date_announce_update" class="form-control">
              </div>
            </div>
                    


      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" onclick="delete_announcement()">Delete Annoncement</a>
        <input type="submit" class="btn btn-secondary" name="submit" value="Update Announcement">

      </div>
         </form>
    </div>
  </div>
</div>
