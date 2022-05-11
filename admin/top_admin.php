<?php     
    session_start();
    if(!$_SESSION['email']) {
        header('location: login.php');
    
    }
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    include 'data.php';
    $dt = new database;
?>
<!DOCTYPE html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - Kí Túc Xá VKU</title>
    <link rel="shortcut icon" type="image/png" href="img/bg-img/vku.png"/> 
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/vku.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <link rel="stylesheet" type="text/css" href="admin/Edit.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css"> 
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <style type="text/css">
      .contact-btn2 {
    margin-top: 20px;
    margin-bottom: 40px;
    width: 140px;
    height: 40px;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
    color: #fff;
    background-color: #6c757d;
    border-radius: 30px;
    }
    .dangtb{
      margin-top: 5px;
      margin-bottom: 15px;
      font-weight: bold;
      font-size: 15px;
    }
    .vku{
      font-size: 20px;
      color: #ffb400;
    }
    </style>
  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <span class="d-none d-md-inline ml-1 vku ">  <img style="height: 30px;" src="images/vku.png"></span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Tìm Kiếm..." aria-label="Search"> </div>
          </form>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?php if(isset($_GET['t']) AND (int)$_GET['t']==1) echo 'active'?>" href="index.php?t=1">
                  <i class="material-icons">assessment</i>
                  <span>Thống kê</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($_GET['t']) AND (int)$_GET['t']==2) echo 'active'?>" href="admin_blog.php?t=2">
                  <i class="material-icons">notifications_active</i>
                  <span>Thông Báo</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($_GET['t']) AND (int)$_GET['t']==3) echo 'active'?>" href="quanlyphong.php?t=3">
                  <i class="material-icons">room</i>
                  <span>Quản Lý Phòng</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($_GET['t']) AND (int)$_GET['t']==4) echo 'active'?>" href="admin_account.php?t=4">
                  <i class="material-icons">supervisor_account</i>
                  <span>Quản Lý Sinh Viên</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($_GET['t']) AND (int)$_GET['t']==5) echo 'active'?>" href="quanlyhoadon.php?t=5">
                  <i class="material-icons">assignment</i>
                  <span>Quản Lý Hóa Đơn</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($_GET['t']) AND (int)$_GET['t']==6) echo 'active'?>" href="vipham.php?t=6">
                  <i class="material-icons">privacy_tip</i>
                  <span>Thông Tin Vi Phạm</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($_GET['t']) AND (int)$_GET['t']==7) echo 'active'?>" href="doiphong.php?t=7">
                  <i class="material-icons">swap_horiz</i>
                  <span>Yêu Cầu Đổi Phòng</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($_GET['t']) AND (int)$_GET['t']==8) echo 'active'?>" href="suachua.php?t=8">
                  <i class="material-icons">room_preferences</i>
                  <span>Báo Cáo Hư Hỏng</span>
                </a>
              </li>
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <div class="navbar-search form-control"> </div>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-md-inline-block" style="padding: 10px; font-size: 15px; font-weight: bold;"><?php $name = $_SESSION['name']; echo $name;?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="register.php">
                      <i class="material-icons">&#xE7FD;</i>Đăng ký USER</a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php">
                      <i class="material-icons text-danger">&#xE879;</i>Đăng xuất</a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
  