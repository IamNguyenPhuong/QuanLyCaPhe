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

if (isset($_POST['btn-reg'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Sử dụng prepared statement để tránh SQL injection
        $stmt = $conn->prepare("SELECT * FROM tbl_coffee_users WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $password = ($_POST['password']);

        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $_SESSION['username'] = $username;
                header('Location: /QuanLyCaPhe/Coffe_Store/trangchu3.php'); // Chuyển hướng đến trang chủ sau khi đăng nhập
        } else {
            echo "<div class='alert alert-danger' role='alert'>Sai tên người dùng hoặc mật khẩu.</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-warning' role='alert'>Bạn cần nhập tên người dùng và mật khẩu.</div>";
    }
}

$conn->close();
?>