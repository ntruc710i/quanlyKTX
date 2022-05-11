<?php
    session_start();
    error_reporting(0);
    if($_SESSION['username'] && $_SESSION['quyen']==0) {
        header('location: index.php?t=1');
    }
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    include 'data.php';
    $dt = new database;
    //Lấy giá trị POST từ form vừa submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["name"])) { $name = addslashes($_POST['name']); }
        
        if(isset($_POST["email"])) { $email = addslashes($_POST['email']); }
        if(isset($_POST["pass"])) { $pass = addslashes($_POST['pass']); }
        $pass = md5($pass);
        $time = date("Y-m-d H:i:s");
        // Kiểm tra username hoặc email có bị trùng hay không
        $dt->select("SELECT * FROM account WHERE email = '$email' ");
        // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
        if ($dt->fetch() > 0) {
            // Sử dụng javascript để thông báo
            echo '<script language="javascript">alert("Tên đăng nhập hoặc địa chỉ email đã được dùng!"); window.location="register.php";</script>';
            // Dừng chương trình
            die ();
        }
        else {
            //Code xử lý, insert dữ liệu vào table
            $dt->command("INSERT INTO account (id_acc,name, email, pass, time, baiviet, quyen) VALUES (NULL, '$name', '$email', '$pass, '1')");
            echo '<script language="javascript"> alert("Đăng Kí Thành Công!"); window.location="index.php";</script>';
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Đăng Kí</title>
<meta charset="UTF-8">
<link href="css/font-awesome.min.dn.css" rel="stylesheet" type="text/css" media="all" />
<link rel="shortcut icon" type="image/png" href="img/bg-img/logo.png"/>
<link href="css/dn.css" rel='stylesheet' type='text/css' media="all" />
</head>
<body>
<h1 class="wls "><a href="index.php?t=1"><img src="img/bg-img/logo.png" alt="" class="mylogo"><img src="img/h.png" alt="" class="mylogo"></a></h1>
<div class="content-wls">
	<div class="content-agile1">
	</div>
	<div class="content-agile2">
		<form action="" method="post">
			<div class="form-control wlayouts"> 
				<input type="text" id="firstname" name="name" placeholder="Họ và Tên" title="Vui lòng điề Họ, Tên" required="">
			</div>
			<div class="form-control wlayouts"> 
				<input type="text" id="firstname" name="user_name" placeholder="Nick Name" title="Vui lòng điền Nick Name" required="">
			</div>
			<div class="form-control wlayouts">	
				<input type="text" id="email" name="email" placeholder="Email" required="">	
			</div>
			<div class="form-control agileinfo">	
				<input type="password" class="lock" name="pass" placeholder="Mật Khẩu" id="password1" required="">
			</div>	
			<div class="form-control agileinfo">	
				<input type="password" class="lock" name="confirm-password" placeholder="Nhập Lại Mật Khẩu" id="password2" required="">
			</div>			
			<input type="submit" class="register"  value="Đăng Kí">
		</form>
		<script type="text/javascript">
			window.onload = function () {
				document.getElementById("password1").onchange = validatePassword;
				document.getElementById("password2").onchange = validatePassword;
			}
			function validatePassword(){
				var pass2=document.getElementById("password2").value;
				var pass1=document.getElementById("password1").value;
				if(pass1!=pass2)
					document.getElementById("password2").setCustomValidity("Mật Khẩu Sai");
				else
					document.getElementById("password2").setCustomValidity('');	 
					//empty string means no validation error
			}
		</script>
		<ul class="social-agileinfo wthree2">
			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa fa-youtube"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>