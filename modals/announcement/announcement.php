<div class="modal fade" id="add_announcement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Announcement</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../../process/admin/announce.php"  enctype="multipart/form-data" method="POST">
            <div class="row">

              <div class="col-12">
                <label>File:</label>
                    <input type="file" name="files[]" id ="files" class="form-control-lg" accept="image/png, image/gif, image/jpeg" required>
              </div>
            </div>
            <br>
            <div class="row">
               <div class="col-6">
                    <label>Description:</label><br>
                    <input type="text" name="description[]" id="descriptions" class="form-control">
              </div>
              <div class="col-6">
                    <label>Announcement Date</label>
                     <input type="date" name="date_announce" id="date_announce" class="form-control">
              </div>
            </div>
                    


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal" onclick="javascript:window.location.reload()">Close</button>
        <input type="submit" class="btn btn-danger" name="submit" value="Submit">

      </div>
         </form>
    </div>
  </div>
</div>
