<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "coffeestore";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công" . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
    header('Location: /Coffe_Store/DANGNHAP/signin.php');
    exit();
}

$username = $_SESSION['username'];

$sql = "DELETE FROM tbl_coffee_users WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
    session_destroy(); // Xóa hết thông tin session
    header('Location: /Coffe_Store/DANGNHAP/signin.php'); // Điều hướng đến trang đăng nhập sau khi xóa tài khoản
} else {
    echo "Lỗi xóa tài khoản: " . $conn->error;
}

$conn->close();
?>