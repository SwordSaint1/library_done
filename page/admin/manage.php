<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/managebar.php';?>
  <!-- Main Sidebar Container -->

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Borrower</h1>
            <br>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Borrower</li>
            </ol>
          </div><!-- /.col -->
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <!-- Button trigger modal -->
            <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#add_borrower_user">Add Borrower</a>
            </ol>
          </div>
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
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                   <div class="row">
                    <div class="col-3">
                    <label>Full Name:</label> <input type="text" name="full_name_manage" id="full_name_manage" class="form-control">
                    </div>
                     <div class="col-9">
                      <span style="visibility:hidden;">.</span>
                      <p style="text-align:right;"><a href="#" class="btn btn-primary" onclick="load_borrowers()">Search <i class="fa fa-search"></a></i></p>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">

                   <li class="nav-item"><a class="nav-link active" href="#borrower_list" data-toggle="tab">Borrower List</a></li>
                    <li class="nav-item"><a class="nav-link" href="#borrower_penalty_list" data-toggle="tab">List of Borrower's with Penalty</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                
               

                  <div class="tab-pane active" id="borrower_list">
                    <form class="form-horizontal">
                        <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Borrower's ID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Contact No</th>
                    <th>Course / Year</th>
                    <th>Points</th>
            </thead>
            <tbody id="list_of_borrowers" style="text-align:center;"></tbody>
                </table>
              </div>
                     
                     
                    
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                   <!-- /.tab-pane -->

                  <div class="tab-pane" id="borrower_penalty_list">
                    <form class="form-horizontal">
                        <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Borrower's ID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Contact No</th>
                    <th>Course / Year</th>
                    <th>Penalty</th>
                    <th>Points</th>
            </thead>
            <tbody id="list_of_borrowers_penalty" style="text-align:center;"></tbody>
                </table>
              </div>
                    </form>
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
<?php include 'plugins/javascript/manage_script.php';?>
