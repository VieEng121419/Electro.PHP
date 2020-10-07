<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SYSTEM PRODUCT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Table -->
  <link rel="stylesheet" href="../public/css/styletable.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/css/all.min.css">
  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="stylesheet" href="../public/css/datatables.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../public/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
      <img src="../public/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SYSTEM PRODUCT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../public/img/logo.jpg" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 40px">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $_SESSION['fullname'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="fas fa-tshirt"></i>
              <p>
                Sản Phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?option=product" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Sản Phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loại Sản Phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?option=post" class="nav-link">
              <i class="far fa-calendar-plus"></i>
              <p>
               Bài Viết
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?option=post" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Danh Sách Bài Viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=topic" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Chủ Đề Bài Viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=page" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Trang Đơn</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item">
                <a href="index.php?option=order" class="nav-link">
                <i class="fas fa-shopping-cart"></i>
                  <p>Đơn Hàng</p>
                </a>
          </li>

          <li class="nav-item">
                <a href="index.php?option=customer" class="nav-link">
                <i class="fas fa-user-circle"></i>
                  <p>Khách Hàng</p>
                </a>
          </li>

          <li class="nav-item">
                <a href="index.php?option=contact" class="nav-link">
                <i class="fas fa-id-badge"></i>
                  <p>Liên Hệ</p>
                </a>
          </li>
          
          
          <li class="nav-item has-treeview">
            <a href="index.php?option=menu" class="nav-link">
            <i class="fas fa-tv"></i>
              <p>
                Giao Diện
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?option=menu" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Menu </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=slider" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p> Slider</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?option=user" class="nav-link">
            <i class="fas fa-table"></i>
              <p>
                Hệ Thống
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?option=user" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Thành Viên </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="insert.php?option=user" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Thêm Thành Viên</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">THÔNG TIN</li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
              <p>Đăng Xuất</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>