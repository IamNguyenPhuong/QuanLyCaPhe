<?php
session_start();
session_destroy(); // Hủy bỏ session
header("Location:../trangchu/trangchu2.html"); // Chuyển hướng về trang đăng nhập
exit();
?>
