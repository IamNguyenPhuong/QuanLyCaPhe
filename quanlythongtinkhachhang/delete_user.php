<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý thao tác xoá người dùng khỏi bảng tbl_coffee_users
    $uid = $_POST["uid"];

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "coffeestore";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Thực hiện xoá người dùng từ bảng tbl_coffee_users
    $sql = "DELETE FROM tbl_coffee_users WHERE uid='$uid'";

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
    <title>Xoá người dùng</title>
</head>
<body>
    <h1>Xoá người dùng</h1>
    <p>Bạn có chắc chắn muốn xoá người dùng này?</p>
    <!-- Form để xác nhận xoá người dùng -->
    <form method="post">
        <input type="hidden" name="uid" value="<?php echo $_GET['id']; ?>">
        <input type="submit" value="Xác nhận xoá">
    </form>
</body>
</html>