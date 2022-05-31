<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/student_infobar.php';?>
  <!-- Main Sidebar Container -->

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Student Info</li>
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
                  <input type="hidden" name="" id="student_info_id" value="<?=$name;?>">
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <?php
                   require '../../process/conn.php';
                  $query ="SELECT sum(datediff('2022-05-28',borrowed_books.due_date) * 10) as penalty,borrower_details.points,borrower_details.full_name,borrower_details.borrowers_id,
    borrower_details.gender,borrower_details.contact_no,borrower_details.course_year,borrower_details.qr_id,borrower_details.id FROM borrowed_books LEFT JOIN borrower_details ON borrower_details.borrowers_id = borrowed_books.borrowers_id WHERE borrowed_books.status = 'Borrow' AND borrower_details.borrowers_id = '$name' GROUP BY borrowed_books.borrowers_id";
                  $stmt = $conn->prepare($query);
                  $stmt->execute();
                  foreach($stmt->fetchALL() as $j){
                    echo '<div class="row">
                     <div class="col-4">
                      <label>Student ID/QR:</label> <input type="text" value="'.$j['borrowers_id'].'" class="form-control" disabled>
                     </div>
                      <div class="col-4">
                      <label>Full Name:</label> <input type="text" value ="'.$j['full_name'].'" class="form-control" disabled>
                     </div>
                      <div class="col-4">
                      <label>Gender:</label> <input type="text" value ="'.$j['gender'].'" class="form-control" disabled>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-4">
                      <label>Contact No:</label> <input type="text" value ="'.$j['contact_no'].'" class="form-control" disabled>
                     </div>
                      <div class="col-4">
                      <label>Course / Year</label> <input type="text" value ="'.$j['course_year'].'" class="form-control" disabled>
                     </div>
                      <div class="col-4">
                      <label>Points:</label> <input type="text" value ="'.$j['points'].'" class="form-control" disabled>
                     </div>
                   </div>
                   <div class="row">
                      <div class="col-4">
                      <label>Penalty:</label> <input type="text" value ="'.$j['penalty'].'" class="form-control" disabled>
                     </div>
                   </div>';
                  }

                  ?>
                   
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
