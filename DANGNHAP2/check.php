<?php
//session_start();
if ((!isset($_SESSION['usernameadmin']))&&(!isset($_SESSION['usernamenhanvien']))) {
    
    echo "<script > alert('Xin hãy đăng nhập');
   
    </script>";
    header('Location: /QuanLyCaPhe/DANGNHAP2/signin.php');
    session_destroy();
  
   
}
?>