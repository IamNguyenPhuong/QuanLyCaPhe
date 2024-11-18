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

if (isset($_POST['fullname'], $_POST['email'], $_POST['gender'], $_POST['address'])) {
    $username = $_SESSION['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $sql = "UPDATE tbl_coffee_nhanvien SET fullname='$fullname', email='$email', gender='$gender', address='$address' WHERE username='$username'";

    if (mysqli_query($conn, $sql)) {
        echo "<script > alert('Cập nhật thành công');
        window.location.href='/QuanLyCaPhe/trangchu/trangchunhanvien.php';
        </script>";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

$conn->close();
?>