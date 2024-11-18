<?php
session_start();
session_destroy(); // Hủy bỏ session
header("Location:/QuanLyCaPhe/Coffe_Store/trangchu3.php"); // Chuyển hướng về trang đăng nhập
exit();
?>
