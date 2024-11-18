<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý thao tác sửa thông tin người dùng trong bảng tbl_coffee_users
    $uid = $_POST["uid"];
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "coffeestore";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Thực hiện cập nhật thông tin người dùng trong bảng tbl_coffee_users
    $sql = "UPDATE tbl_coffee_users SET
            fullname='$fullname', gender='$gender', email='$email', address='$address'
            WHERE uid='$uid'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<html>
<head>
    <title>Sửa thông tin người dùng</title>
</head>
<body>
    <h1>Sửa thông tin người dùng</h1>
    <!-- Form để sửa thông tin người dùng -->
    <form method="post">
        <input type="hidden" name="uid" value="<?php echo $_GET['id']; ?>">
        <label for="fullname">Họ và tên:</label>
        <input type="text" name="fullname" required><br>
        <label for="gender">Giới tính:</label>
        <input type="text" name="gender" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="address">Địa chỉ:</label>
        <input type="text" name="address" required><br>
        <input type="submit" value="Xác nhận sửa">
    </form>
</body>
</html>