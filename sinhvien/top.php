<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header('location: ../');
   	}
?>
<title>Quản lí KTX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">


<div style="height: 45px; background-color: #f79d2d;"></div>
    <div class="container">
        <div class="header">
            <img class="img" src="../img/logo.png">
            <span class="header-title">TRANG THÔNG TIN SINH VIÊN Ở KÝ TÚC XÁ ĐẠI HỌC CNTT & TT VIỆT HÀN</span>
        </div>

    </div>

    <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="Index.php">Thông Báo <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hoadon.php">Hóa Đơn Điện Nước</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lichsuthanhtoan.php">Lịch sử thanh toán</a>
                </li><li class="nav-item">
                  <a class="nav-link" href="vipham.php">Vi Phạm</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="doiphong.php">Đổi Phòng</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="suachua.php">Sửa Chửa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../chuc-nang/logout.php"><?php echo $_SESSION['username'] ?></a>
            </li>
                
            </ul>
        </div>
    </nav>