<?php
    session_start();
    error_reporting(0);
    if($_SESSION['email']) {
        header('location: index.php?t=1');
    }
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    include 'data.php';
    $dt = new database;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Lấy dữ liệu nhập vào
        if(isset($_POST["email"])) { $email = addslashes($_POST['email']); }
        if(isset($_POST["pass"])) { $pass = addslashes($_POST['pass']); }
        $pass = md5($pass);
        //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
        if (!$email || !$pass) {
        echo '<script language="javascript"> alert("Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!"); history.go(-1); </script>';
        exit;
        }
        //Kiểm tra tên đăng nhập có tồn tại không
        $dt->select("SELECT * FROM account WHERE email='$email'");
        $row = $dt->fetch();
        if ($row == 0) {
            echo '<script language="javascript"> alert("Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại!"); history.go(-1); </script>';
            exit;
        }
        //So sánh 2 mật khẩu có trùng khớp hay không
        if($pass == $row['pass']) {
            $name = $row['name'];
            $quyen = $row['quyen'];
            $_SESSION['name'] = $name;
            
            $_SESSION['email'] = $email;
           
            $_SESSION['quyen'] = $quyen;
            if($row['quyen']) {
                echo '<script language="javascript"> alert("Bạn đã đăng nhập với quyền ADMIN!"); window.location="index.php?t=1"; </script>';
                exit;
            } else {
                echo '<script language="javascript"> alert("Bạn đã đăng nhập thành công!"); window.location="index.php?t=1"; </script>';
                die();
            }
        } else {
            echo '<script language="javascript"> alert("Mật khẩu không đúng. Vui lòng nhập lại!"); history.go(-1); </script>';
            exit;
        }
    }
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
 <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Business Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/Loginad.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- //google fonts -->
    
</head>
<body>

<div class="signupform">
    <div class="container">
        <!-- main content -->
        <div class="agile_info">
            <div class="w3l_form">
                <div class="left_grid_info">
                    <img src="images/Anhlogin.jpg" alt="" />
                </div>
            </div>
            <div class="w3_info">
                <h2>Đăng Nhập ADMIN</h2>
                <form action="Login.php" method="post">
                    <label>Email</label>
                    <div class="input-group">
                        <span class="fa fa-envelope" aria-hidden="true"></span>
                        <input type="email" placeholder="Nhập Email" name="email" required=""> 
                    </div>
                    <label>Mật Khẩu</label>
                    <div class="input-group">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="Password" placeholder="Nhập Mật Khẩu" name="pass" required="">
                    </div> 
                    <div class="login-check">
                         <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Remember me</label>
                    </div>                      
                        <button class="btn btn-danger btn-block" type="submit">Login</button >                
                </form>
            </div>
        </div>
        <!-- //main content -->
    </div>
    <!-- footer -->
    <div class="footer">
    </div>
    <!-- footer -->
</div>
    
</body>
</html>