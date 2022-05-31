<div class="modal fade bd-example-modal-lg" id="update_book_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Book Details</h5>
        <input type="hidden" name="" id="id_update">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
             <div class="col-3">
              <label>Acquisition No: &nbsp;&nbsp;</label> <input type="text" name="acquisituin_no_update" id="acquisituin_no_update" class="form-control" autocomplete="off">
            </div>
          <div class="col-3">
              <label>Book Title: &nbsp;&nbsp;</label> <input type="text" name="book_title_update" id="book_title_update" class="form-control" autocomplete="off">
            </div>
            <div class="col-3">
              <label>Description:</label> <input type="text" name="description_update" id="description_update" class="form-control" autocomplete="off">
            </div>
            <div class="col-3">
              <label>Author:</label> <input type="text" name="author_update" id="author_update" class="form-control" autocomplete="off">
            </div>
               
        </div>

        <div class="row"> 
         <div class="col-4">
              <label>Date Publish: &nbsp;&nbsp;</label> <input type="date" name="date_publish_update" id="date_publish_update" class="form-control">
            </div>           
            <div class="col-4">
              <label>Category:</label> <input type="text" name="category_update" id="category_update" class="form-control" autocomplete="off">
            </div>
            <div class="col-4">
              <label>Type of Book:</label> <input type="text" name="book_type_update" id="book_type_update" class="form-control" autocomplete="off">
            </div> 
                 
      </div>
      <div class="row">
         <div class="col-4">
              <label>Quantity of Book:</label> <input type="text" name="book_qty_update" id="book_qty_update" class="form-control" autocomplete="off" onkeypress="return event.charCode >= 48" min="1">
            </div>    
         <div class="col-4">
              <label>Location:</label> <input type="text" name="location_update" id="location_update" class="form-control" autocomplete="off">
            </div>
            <div class="col-4">
              <label>Shelf:</label> <input type="text" name="shelf_updates" id="shelf_updates" class="form-control" autocomplete="off">
            </div>       
      </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" onclick="delete_book()">Delete Book</a>
        <a href="#" class="btn btn-secondary" onclick="update_book()">Update Book</a>
      </div>
    </div>
  </div>
</div>