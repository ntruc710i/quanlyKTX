<?php
    session_start();
    unset($_SESSION['username']);
	unset($_SESSION['id_sinhvien']);
	unset($_SESSION['id_giuong']);
	unset($_SESSION['id_phong']);
    header("location: ../");
?>