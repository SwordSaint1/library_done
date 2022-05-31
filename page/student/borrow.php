<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/borrowbar.php';?>
  <!-- Main Sidebar Container -->

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Borrow a Book</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Borrow a Book</li>
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
                  <input type="hidden" name="" id="student_id_list" value="<?=$name;?>">
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#borrow">Borrow Book</a>
                    </div>
                    <div class="col-12">
                       <div class="card-body table-responsive p-0" style="height: 420px;">
                        <h3 style="text-align:center;">List of Borrowed Books</h3>
                <table class="table table-head-fixed text-nowrap table-hover" id="">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Book Title</th>
                    <th>Description</th>
                    <th>Return Date</th>
            </thead>
            <tbody id="list_of_borrow_books" style="text-align:center;"></tbody>
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
<?php include 'plugins/javascript/borrow_script.php';?>
