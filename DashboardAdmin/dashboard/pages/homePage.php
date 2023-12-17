<?php
session_start();

require("../../db.php") ;


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <style>
    tr{
      text-align: center;
    }
    td{
      text-align: center;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<?php

if (isset($_SESSION['success']) && $_SESSION['success'] === true) {
  // Display Sweet Alert for success
  echo "<script>
          Swal.fire({
             position: 'center',
             icon: 'success',
             title: 'Your work has been saved',
             showConfirmButton: false,
             timer: 2500
          });
       </script>";

  // Reset the session variable to avoid showing the alert on subsequent page loads
  unset($_SESSION['success']);
}
?>


<div class="wrapper">





  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      


     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

           <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="homePage.php?page=home" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Home
                  </p>
                </a>
              </li>



            
            <li class="nav-item">
                <a href="homePage.php?page=user" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Users
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="homePage.php?page=catagory" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Category
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="homePage.php?page=sub" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Sub Category
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="homePage.php?page=product" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Products
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="homePage.php?page=order" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Orders
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="homePage.php?page=pay" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Payment
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="homePage.php?page=location" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Location
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="homePage.php?page=contact" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Contact US
                  </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="homePage.php?page=homeUser" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Home User
                  </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="homePage.php?page=service" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Service
                  </p>
                </a>
              </li>
              
            
            </ul>
          </li>
          <li class="nav-item menu-open">
           


            </ul>
          </li>
         
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->



        <!-- <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div> -->


        <?php
        $page = isset($_GET['page']) ? $_GET['page']  : 'default';

        switch ($page) {
            case 'user':
                include("user/user.php");
                break;
            case 'home':
                include("home.php");
                break;
           
            case 'catagory':
                include("catagory/Catagory.php");
                break;
            case 'sub':
                include("sub_catagory/sub_catagory.php");
                break;
            case 'product':
                    include("product/product.php");
                    break;
            case 'order':
                include("order/order.php");
                break;
            case 'pay':
                include("payement/payement.php");
                break;            
            case 'contact':
                include("contact/contact.php");
                break;            
            case 'homeUser':
                include("homeUser/homeUser.php");
                break;
            case 'location':
                include("location/location.php");
                break;   
            case 'service':
                include("service/service.php");
                break;     
            case 'default':
                include("home.php");
                break;       
        }
        ?>
      

        <!-- /.row -->
        <!-- Main row -->
    
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

</body>
</html>
