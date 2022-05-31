<div class="modal fade bd-example-modal-lg" id="borrow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Borrow Book</b></h5>
         <input type="hidden" name="" id="student_id" value="<?=$name;?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
              <label>Student QR Code:</label> <input type="text" name="student_qr" id="student_qr" class="form-control">
            </div>
             <div class="col-6">
              <label>Book QR Code: &nbsp;&nbsp;</label> <input type="text" name="book_qr" id="book_qr" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
              <label>Return Date:</label> <input type="date" name="return_date" id="return_date" class="form-control">
            </div>
             <div class="col-6">
              <label>Verification of Borrower:</label> <input type="text" name="student_name" id="student_name" class="form-control" placeholder="Input Full Name">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-danger" onclick="borrow_book()">Proceed</a>
      </div>
    </div>
  </div>
</div>