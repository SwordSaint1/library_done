<div class="modal fade bd-example-modal-lg" id="return_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Return Book</b></h5>
         <input type="hidden" name="" id="student_id" value="<?=$name;?>">
         <input type="hidden" name="" id="book_qr_return">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="" id="id_return">
        <input type="hidden" name="" id="points_return">
        <div class="row">
            <div class="col-6">
              <label>Student QR Code:</label> <input type="text" name="student_qr_return" id="student_qr_return" class="form-control" autocomplete="off">
            </div>
              <div class="col-6">
              <label>Status Points:</label> 
              <select id="status_points" class="form-control">
                <option value="">Select Status</option>
                <option value="ontime">On-Time</option>
                <option value="overdue">Overdue</option>
                <option value="lost">Lost</option>
              </select>
            </div>
        </div>
        <div class="row">
          <div class="col-4">
              <label>Book Title: &nbsp;&nbsp;</label> <input type="text" name="book_title_return" id="book_title_return" class="form-control" disabled>
            </div>
            <div class="col-4">
              <label>Description:</label> <input type="text" name="description_return" id="description_return" class="form-control" disabled>
            </div>
            <div class="col-4">
              <label>Due Date:</label> <input type="date" name="due_date_return" id="due_date_return" class="form-control" disabled="">
            </div>          
        </div>
         <div class="row">
            <div class="col-6">
              <label>Acknowledge By:</label> <input type="text" name="acknowledge_return" id="acknowledge_return" class="form-control" value="<?=$name;?>" disabled>
            </div>
            <div class="col-6">
              <label>Recieved Date:</label> <input type="date" name="date_return" id="date_return" class="form-control" value="<?=$server_date_only;?>" disabled>
            </div>          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-danger" onclick="recieved_book()">Recieved Book</a>
      </div>
    </div>
  </div>
</div>