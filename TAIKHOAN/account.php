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
if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success' role='alert'>{$_SESSION['success_message']}</div>";
    unset($_SESSION['success_message']); // Xoá thông báo sau khi hiển thị
}

if (!isset($_SESSION['usernamenhanvien'])) {
    header('Location: /QuanLyCaPhe/DANGNHAP2/signin.php');
    exit();
}

$username = $_SESSION['usernamenhanvien'];

$sql = "SELECT * FROM tbl_coffee_nhanvien WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Lấy thông tin người dùng
    $fullname = $row['fullname'];
    $email = $row['email'];
    $gender = $row['gender'];
    $address = $row['address'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="account_style.css">
</head>
<body>
    <a href="/QuanLyCaPhe/trangchu/trangchunhanvien.php">Quay lại</a>
    <h1>Thông tin tài khoản</h1>
    <form action="/QuanLyCaPhe/TAIKHOAN/update_account.php" method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly><br>

        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required><br>

       


        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>

        <label for="gender">Giới tính:</label>
            <input type="text" name="gender" value="<?php echo $gender; ?>" required><br>


        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" value="<?php echo $address; ?>" required><br>

        <input type="submit" value="Cập nhật">

    </form>
    <form action="/QuanLyCaPhe/TAIKHOAN/delete_account.php" method="post" onsubmit="return confirm('Bạn có chắc muốn xóa tài khoản?')">
    <a href="/QuanLyCaPhe/trangchu/trangchunhanvien.php">Quay lại</a>
    </form>

  

</body>
</html>