<?php

session_start();
require("../../../db.php");

$categoriesQuery = $pdo->query("SELECT id, name FROM catagory");
$categories = $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  try {
    $name = $_POST['name'];
    $catagory_id = $_POST['catagory_id'];

    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];
    // Check for file type
    $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($imageType, $allowedFileTypes)) {
      die('Invalid file type. Allowed types: jpeg, png, gif');
    }
    // Check for file size
    $maxFileSize = 20 * 1024 * 1024; //
    if ($imageSize > $maxFileSize) {
      die('File size exceeds the maximum allowed size');
    }
    // Generate a unique filename
    $uniqueFilename = uniqid() . '_'. $_FILES['image']['name'];
    $imagePath = "../../uploads/images/" . $uniqueFilename;
    // Move the uploaded file to the destination
    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
      echo 'File uploaded successfully.';
      //Further processing if needed
    } else {
      echo 'Error uploading file.';
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $pdo->prepare("SELECT * FROM sub_catagory 
                          INNER JOIN catagory ON sub_catagory.catagory_id = catagory.id
                          WHERE sub_catagory.name = :name");

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      die("<h1 style='margin-left: 500px;'>Already exists</h1>");
    }

    $stmt = $pdo->prepare("INSERT INTO sub_catagory (name, image, catagory_id) 
                          VALUES (:name, :image, :catagory_id)");

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':image', $imagePath, PDO::PARAM_STR);
    $stmt->bindParam(':catagory_id', $catagory_id, PDO::PARAM_STR);

    if ($stmt->execute()) {
      $_SESSION['success'] = true;
      header('location:../homePage.php?page=sub');
    } else {
      echo "<h1 style='margin-left: 500px;'>Error inserting data: " . $stmt->errorInfo()[2] . "</h1>";
    }
  } catch (Exception $e) {
    echo "Error: ". $e->getMessage();
  }
}

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
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">


  <style>
    tr {
      text-align: center;
    }

    td {
      text-align: center;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">




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
            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                <a href="../homePage.php?page=home" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Home
                  </p>
                </a>
              </li>



            
            <li class="nav-item">
                <a href="../homePage.php?page=user" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Users
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../homePage.php?page=catagory" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Category
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../homePage.php?page=sub" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Sub Category
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../homePage.php?page=product" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Products
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../homePage.php?page=order" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Orders
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../homePage.php?page=pay" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Payment
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../homePage.php?page=location" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Location
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../homePage.php?page=contact" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Contact US
                  </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="../homePage.php?page=homeUser" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                  Home User
                  </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="../homePage.php?page=service" class="nav-link">
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



          <section class="content" style="margin: 15px;">
            <form method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Create Category</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">


                      <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" id="inputName" name="name" class="form-control">
                      </div>


                      <div class="form-group">
                        <label for="inputStatus">Category</label>
                          <select  name="catagory_id" id="inputStatus" class="form-control custom-select">
                            <option disabled>Select one</option>
                            <?php foreach ($categories as $catagory): ?>
                              <option value="<?php echo $catagory['id']; ?>"><?php echo $catagory['name']; ?></option>
                            <?php endforeach; ?>   
                            <option selected>Success</option>
                          </select>
                      </div>


                      <div class="form-group">
                        <label for="inputName">Image</label>
                        <input type="file" id="inputName" name="image" class="form-control">
                      </div>

                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>

              </div>
              <div class="row">
                <div class="col-12">
                  <a href="../homePage.php?page=sub" class="btn btn-secondary">Cancel</a>
                  <input type="submit" name="submit" value="Save Changes" class="btn btn-success float-right">
                </div>
              </div>
            </form>
          </section>



          <!-- /.row -->
          <!-- Main row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>