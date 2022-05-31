  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?=$role;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">

        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$name;?></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="dashboard.php" class="nav-link ">
              <i class="fas fa-bullhorn"></i>
              <p>
                Announcement
               
              </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="borrowed.php" class="nav-link ">
              <i class="fas fa-hand-holding"></i>
              <p>
                Borrowed Books
               
              </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="returned.php" class="nav-link">
              <i class="fas fa-handshake"></i>
              <p>
                Returned Books
               
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="overdue.php" class="nav-link active">
              <i class="fas fa-clock"></i>
              <p>
                Overdue Books
               
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="lost_book.php" class="nav-link">
              <i class="fas fa-question"></i>
              <p>
                Lost Books
               
              </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="masterlist.php" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Book Masterlist
               
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="archived_books.php" class="nav-link">
              <i class="fas fa-archive"></i>
              <p>
                Archived Books
               
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="report.php" class="nav-link">
              <i class="fas fa-file-alt"></i>
              <p>
                Report
               
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="manage.php" class="nav-link">
              <i class="fas fa-user-cog"></i>
              <p>
               Manage Borrower              
              </p>
            </a>
          </li>
               <li class="nav-item">
            <a href="accounts.php" class="nav-link">
              <i class="fa fa-users"></i>
              <p>
               Manage Accounts              
              </p>
            </a>
          </li>     
                <li class="nav-item">
            <a href="student_qr.php" class="nav-link ">
               <i class="fas fa-user-graduate"></i> <i class="fa fa-qrcode"></i>
              <p>
               Student QR-Codes              
              </p>
            </a>
          </li>     
              
              <li class="nav-item">
            <a href="book_qr.php" class="nav-link">
             <i class="fa fa-book"></i> <i class="fa fa-qrcode" ></i>
              <p>
               Book QR-Codes              
              </p>
            </a>
          </li>   
           
           
          </li>  
         <?php include 'logout.php' ;?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
