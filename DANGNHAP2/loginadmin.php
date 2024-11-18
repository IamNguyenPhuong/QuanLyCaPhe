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

if (isset($_POST['btn-admin'])) {
    $username = $_POST['usernameadmin'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Sử dụng prepared statement để tránh SQL injection
        $stmt = $conn->prepare("SELECT * FROM tbl_coffee_nhanvien WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $password = $_POST['password'];

        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $_SESSION['usernameadmin'] = $username;
            if($_SESSION['usernameadmin']=='admin'){
                header('Location: /QuanLyCaPhe/trangchu/trangchuquanly.php');

            }else{
                echo "<div class='alert alert-danger' role='alert'>Sai tên người dùng hoặc mật khẩu.</div>";
            }
           
           
    } else {
        echo "<div class='alert alert-danger' role='alert'>Sai tên người dùng hoặc mật khẩu.</div>";
    }
}
}

$conn->close();
?>
