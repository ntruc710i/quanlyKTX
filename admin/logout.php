<?php
    session_start();
    unset($_SESSION['email']);
  
    unset($_SESSION['quyen']);
    header("location: login.php");
?>