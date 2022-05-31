<div class="modal fade bd-example-modal-lg" id="archived_book_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Archived Book</h5>
        <input type="hidden" name="" id="id_update_archived" disabled>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
             <div class="col-3">
              <label>Acquisition No: &nbsp;&nbsp;</label> <input type="text" name="acquisituin_no_update_archived" id="acquisituin_no_update_archived" class="form-control" autocomplete="off" disabled>
            </div>
          <div class="col-3">
              <label>Book Title: &nbsp;&nbsp;</label> <input type="text" name="book_title_update_archived" id="book_title_update_archived" class="form-control" autocomplete="off" disabled>
            </div>
            <div class="col-3">
              <label>Description:</label> <input type="text" name="description_update_archived" id="description_update_archived" class="form-control" autocomplete="off" disabled>
            </div>
            <div class="col-3">
              <label>Author:</label> <input type="text" name="author_update_archived" id="author_update_archived" class="form-control" autocomplete="off" disabled>
            </div>
               
        </div>

        <div class="row"> 
         <div class="col-4">
              <label>Date Publish: &nbsp;&nbsp;</label> <input type="date" name="date_publish_update_archived" id="date_publish_update_archived" class="form-control" disabled>
            </div>           
            <div class="col-4">
              <label>Category:</label> <input type="text" name="category_update_archived" id="category_update_archived" class="form-control" autocomplete="off" disabled>
            </div>
            <div class="col-4">
              <label>Type of Book:</label> <input type="text" name="book_type_update_archived" id="book_type_update_archived" class="form-control" autocomplete="off" disabled>
            </div> 
                 
      </div>
      <div class="row">
         <div class="col-4">
              <label>Quantity of Book:</label> <input type="text" name="book_qty_update_archived" id="book_qty_update_archived" class="form-control" autocomplete="off" onkeypress="return event.charCode >= 48" min="1" disabled>
            </div>    
         <div class="col-4">
              <label>Location:</label> <input type="text" name="location_update_archived" id="location_update_archived" class="form-control" autocomplete="off" disabled>
            </div>
            <div class="col-4">
              <label>Shelf:</label> <input type="text" name="shelf_updates_archived" id="shelf_updates_archived" class="form-control" autocomplete="off" disabled>
            </div>       
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-danger" onclick="back_to_masterlist()">Return Book to Masterlist</a>
      </div>
    </div>
  </div>
</div>