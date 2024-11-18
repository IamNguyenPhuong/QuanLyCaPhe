<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete_staff</title>
</head>
<body>
    
</body>
</html>
<html>
<head>
    <title>Xoá Nhân Viên</title>
</head>
<body>
    <h1>Xoá Nhân Viên</h1>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffeestore";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

$MaNV = $_GET['MaNV'];

$sql = "DELETE FROM tbl_ttnv WHERE MaNV = '$MaNV'";

if ($conn->query($sql) === TRUE) {
    // Chuyển về trang index.php sau khi xoá thông tin thành công
    header("Location: index.php");
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</body>
</html>