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
    <title>Thêm thông tin người dùng</title>
</head>
<body>
    <h2>Thêm thông tin người dùng</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Xử lý lưu thông tin người dùng vào cơ sở dữ liệu
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

        // Thực hiện truy vấn để thêm thông tin người dùng
        $sql = "INSERT INTO tbl_coffee_users (fullname, gender, email, address) VALUES ('$fullname', '$gender', '$email', '$address')";

        if ($conn->query($sql) === TRUE) {
            // Thêm thành công, chuyển hướng về trang index.php
            header("Location: index.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <!-- Biểu mẫu nhập thông tin mới -->
    <form method="post" action="add_user.php">
        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname" required><br><br>

        <label for="gender">Giới tính:</label>
        <input type="text" id="gender" name="gender" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" required><br><br>

        <input type="submit" value="Xác nhận thêm">
    </form>
</body>
</html>