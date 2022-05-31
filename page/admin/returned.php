<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/returnedbar.php';?>
  <!-- Main Sidebar Container -->

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Returned Books</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Returned Books</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">
                  <input type="hidden" name="" id="student_id_returned" value="<?=$name;?>">
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                   <div class="row">
                    <div class="col-3">
                    <label>Borrower's ID:</label> <input type="text" name="borrower_id_returned" id="borrower_id_returned" class="form-control">
                    </div>
                    <div class="col-3">
                    <label>Book Title:</label> <input type="text" name="book_returned" id="book_returned" class="form-control">
                    </div>
                     <div class="col-3">
                      <label>Date Returned:</label><input type="date" name="" id="date_returned" class="form-control">
                    </div>
                     <div class="col-3">
                      <span style="visibility:hidden;">.</span>
                      <p style="text-align:right;"><a href="#" class="btn btn-primary" onclick="load_returned_books()">Search <i class="fa fa-search"></a></i></p>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                       <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Borrower's ID</th>
                    <th>Book Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Date Returned</th>
            </thead>
            <tbody id="list_of_returned_books" style="text-align:center;"></tbody>
                </table>
              </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                
                </div>
              </form>
            </div>
            <!-- /.card -->

</div>
</div>
</div>
</section>
</div>

<?php include 'plugins/footer.php';?>
<?php include 'plugins/javascript/returned_script.php';?>
