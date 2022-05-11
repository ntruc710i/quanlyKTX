<?php
    session_start();
    if(isset($_SESSION['username'])) {
        header('location: ../sinhvien/');
    }
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    include '../data.php';
    $dt = new database;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Lấy dữ liệu nhập vào
        if(isset($_POST["StudentCode"])) { $user_name = addslashes($_POST['StudentCode']); }
        if(isset($_POST["PIN"])) { $pass = addslashes($_POST['PIN']); }
        $pass = md5($pass);
        //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
        
        //Kiểm tra tên đăng nhập có tồn tại không
        $dt->select("SELECT * FROM sinhvien WHERE user_name='$user_name'");
        $row = $dt->fetch();
        if ($row == 0) {
            echo '<script language="javascript"> alert("Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại!"); history.go(-1); </script>';
            exit;
        }
        //So sánh 2 mật khẩu có trùng khớp hay không
        if($pass == $row['password']) {
            $_SESSION['username'] = $user_name;
			$_SESSION['id_sinhvien'] = $row['id_sinhvien'];
			$_SESSION['id_giuong'] = $row['id_giuong'];
			
                echo '<script language="javascript"> alert("Bạn đã đăng nhập thành công!"); window.location="../sinhvien/"; </script>';
                die();
         
        } else {
            echo '<script language="javascript"> alert("Mật khẩu không đúng. Vui lòng nhập lại!"); history.go(-1); </script>';
            exit;
        }
    }
?>