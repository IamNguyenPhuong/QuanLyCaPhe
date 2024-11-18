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

if (!isset($_SESSION['username'])) {
    header('Location: /QuanLyCaPhe/Coffe_Store/DANGNHAP/signin.php');
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM tbl_coffee_users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Lấy thông tin người dùng
    $fullname = $row['fullname'];
    $password=$row['password'];
    $email = $row['email'];
    $gender = $row['gender'];
    $address = $row['address'];
    //code them
    $_SESSION['fullname']=$fullname;
    $_SESSION['email']=$email;
    $_SESSION['gender']=$gender;
    $_SESSION['address']=$address;
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
    <style>
    .password-display {
        display: flex;
        align-items: center;
    }

    /* Định dạng label */
    label {
        margin-right: 5px; /* Khoảng cách giữa label và checkbox */
    }
</style>
</head>
<body>
    <a href="/QuanLyCaPhe/Coffe_Store/trangchu3.php">Trang chủ</a>
    <h1>Thông tin tài khoản</h1>
    <form action="/QuanLyCaPhe/Coffe_Store/TAIKHOAN/update_account.php" method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly>

        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required>

        
        
    
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password"  value="<?php echo $password; ?>" required>

        <div class="password-display">
    <label for="showPasswordCheckbox">Hiển thị mật khẩu:</label>
    <input type="checkbox" id="showPasswordCheckbox" onclick="togglePasswordVisibility()">
    </div>


        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>

        <label for="gender">Giới tính:</label>
        <div class="radio-group">
            <input type="radio" id="male" name="gender" value="male" <?php if ($gender == 'male') echo 'checked'; ?>>
            <label for="male">Nam</label>
             <input type="radio" id="female" name="gender" value="female" <?php if ($gender == 'female') echo 'checked'; ?>>
             <label for="female">Nữ</label>
        </div>
        <br>
<label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" value="<?php echo $address; ?>" required><br>

        <input type="submit" value="Cập nhật">

    </form>
    <form action="/QuanLyCaPhe/Coffe_Store/TAIKHOAN/delete_account.php" method="post" onsubmit="return confirm('Bạn có chắc muốn xóa tài khoản?')">
    <input type="submit" value="Xóa tài khoản">
    </form>

  

</body>
</html>
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var checkbox = document.getElementById("showPasswordCheckbox");
        
        if (checkbox.checked) {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>