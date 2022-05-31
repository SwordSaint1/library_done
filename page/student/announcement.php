<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/announcementbar.php';?>
  <!-- Main Sidebar Container -->

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Announcement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Announcement</li>
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
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <?php 
                  require '../../process/conn.php';
                  $query ="SELECT * FROM announcement GROUP BY id ORDER BY id DESC";
                  $stmt = $conn->prepare($query);
                  $stmt->execute();
                  foreach($stmt->fetchALL() as $j){
                     echo' <div class="row">
                  <div class="col-sm-12">
                 
                  <p id="content'.$j['id'].'" style="text-align:center;"><img src="../../process/admin/'.$j['image'].'" width="200px" height="200px"/> 
                  </p>
                   <h4 id="date_created'.$j['id'].'" style="text-align:center;">'.$j['date_announce'].'</h4>
                  <h4 id="content'.$j['id'].'" style="text-align:center;">'.$j['announcement_description'].' 
                  </h4>

                  <hr>
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
<?php include 'plugins/javascript/dashboard_script.php';?>
