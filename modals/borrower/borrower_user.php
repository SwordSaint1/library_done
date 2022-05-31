<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="add_borrower_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Borrower</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
              <label>Borrower's ID:</label> <input type="text" name="borrow_id_user" id="borrow_id_user" class="form-control" autocomplete="off">
            </div>
            <div class="col-4">
              <label>Full Name:</label> <input type="text" name="full_name_user" id="full_name_user" class="form-control" autocomplete="off">
            </div>
            <div class="col-4">
              <label>Gender:</label>
              <select id="gender_user" class="form-control">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
        </div>
         <div class="row">
            <div class="col-4">
              <label>Contact No:</label> <input type="text" name="contact_no_user" id="contact_no_user" class="form-control" autocomplete="off">
            </div>
            <div class="col-4">
              <label>Course / Year:</label> <input type="text" name="course_user" id="course_user" class="form-control" autocomplete="off">
            </div>
            <div class="col-4">
              <label>QR:</label> <input type="text" name="qr_user" id="qr_user" class="form-control" autocomplete="off">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-danger" onclick="register_borrower()">Register Borrower</a>
      </div>
    </div>
  </div>
</div>