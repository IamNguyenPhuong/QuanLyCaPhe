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

if (isset($_POST['fullname'], $_POST['password'], $_POST['email'], $_POST['gender'], $_POST['address'])) {
    $username = $_SESSION['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    

    $sql = "UPDATE tbl_coffee_users SET fullname='$fullname',password='$password', email='$email', gender='$gender', address='$address' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Thông tin đã được cập nhật thành công.";
        header("Location:/QuanLyCaPhe/Coffe_Store/TAIKHOAn/account.php");
    } else {
        echo "Lỗi cập nhật: " . $conn->error;
    }
}

$conn->close();
?>