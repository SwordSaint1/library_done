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
            <a href="announcement.php" class="nav-link">
              <i class="fas fa-bullhorn"></i>
              <p>
               Announcement 
               
              </p>
            </a>
          </li>
               <li class="nav-item">
            <a href="dashboard.php" class="nav-link ">
              <i class="fa fa-list-ul"></i>
              <p>
               Rules 
               
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="how_to_borrow.php" class="nav-link">
              <i class="fas fa-question"></i>
              <p>
               How to Borrow a Book 
               
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="how_to_return.php" class="nav-link">
              <i class="fas fa-question"></i>
              <p>
               How to Return a Book 
               
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="search_books.php" class="nav-link">
              <i class="fas fa-search"></i>
              <p>
              Search Book
               
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="borrow.php" class="nav-link active">
              <i class="fas fa-hand-holding"></i>
              <p>
              Borrow a Book 
               
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="return.php" class="nav-link">
              <i class="fas fa-handshake"></i>
              <p>
              Returned Books  
               
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="penalties.php" class="nav-link">
              <i class="fas fa-donate"></i>
              <p>
              Penalties 
               
              </p>
            </a>
          </li> 
           <li class="nav-item">
            <a href="lost.php" class="nav-link">
              <i class="fas fa-exclamation"></i>
              <p>
              Lost 
               
              </p>
            </a>
          </li> 
            <li class="nav-item">
            <a href="student_info.php" class="nav-link">
              <i class="fas fa-address-card"></i>
              <p>
              Student Info 
               
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
