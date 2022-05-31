<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="update_borrower" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Borrower's Details</h5>
        <input type="hidden" name="" id="id_borrow_user_update">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
              <label>Borrower's ID:</label> <input type="text" name="borrow_id_user_update" id="borrow_id_user_update" class="form-control" autocomplete="off">
            </div>
            <div class="col-4">
              <label>Full Name:</label> <input type="text" name="full_name_user_update" id="full_name_user_update" class="form-control" autocomplete="off">
            </div>
            <div class="col-4">
              <label>Gender:</label>
              <select id="gender_user_update" class="form-control">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
        </div>
         <div class="row">
            <div class="col-4">
              <label>Contact No:</label> <input type="text" name="contact_no_user_update" id="contact_no_user_update" class="form-control" autocomplete="off">
            </div>
            <div class="col-4">
              <label>Course / Year:</label> <input type="text" name="course_user_update" id="course_user_update" class="form-control" autocomplete="off">
            </div>
            <div class="col-4">
              <label>QR:</label> <input type="text" name="qr_user_update" id="qr_user_update" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
              <label>Penalty:</label> <input type="text" name="penalty_user_update" id="penalty_user_update" class="form-control" disabled>
            </div>
            <div class="col-4">
              <label>Points:</label> <input type="text" name="points_user_update" id="points_user_update" class="form-control" disabled>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" onclick="delete_borrower()">Delete Borrower</a>
        <a href="#" class="btn btn-secondary" onclick="update_borrower()">Update Borrower</a>
      </div>
    </div>
  </div>
</div>