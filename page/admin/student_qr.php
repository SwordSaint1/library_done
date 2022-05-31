<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/student_qrbar.php';?>
  <!-- Main Sidebar Container -->

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student QR-Codes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Student QR-Codes</li>
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
                 
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                <?php 
include '../../process/conn.php';
include('../../phpqrcode/qrlib.php');

 $query = "SELECT borrowers_id,full_name FROM borrower_details";
 $stmt = $conn->prepare($query);
 $stmt->execute();
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 foreach($rows as $row => $j){
      
      $qr = $j['borrowers_id'];
      $full_name = $j['full_name'];

     $tempDir = "../../process/admin/student_qr/";
    
    $codeContents = $qr;

    
    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...

    $tag = '.png';
    $fileName = $codeContents.''.$tag;

    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;
    
    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath);
        // echo 'File generated!';
        // echo '<hr />';
    } else {
        // echo 'File already generated! We can use this cached file to speed up site on common codes!';
        // echo '<hr />';
    }
    
    // echo 'Server PNG File: '.$pngAbsoluteFilePath;
    // echo '<hr />';
    
    // displaying

     echo $full_name;
    echo '<img src="'.$urlRelativeFilePath.'" width="100" height="100"/>'; 
   

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
