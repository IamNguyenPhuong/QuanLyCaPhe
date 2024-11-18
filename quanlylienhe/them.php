<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm liên hệ</title>
    <style>
        * {
            box-sizing:border-box;
        }
        .container{
            max-width: 900px;
            color: #fff;
            background-color: #0f7f2a;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
        }
        .form{
            background-color: #0f7f2a;
            justify-content: space-between;
            align-items: center;
        }
        .form-group{
            justify-content: space-between;
            align-items: center;
            z-index: 1;
            display: flex;
            background-color: #0f7f2a;
            padding: 0.7em 0.5em;
        }
        .form-control {
            justify-content: space-between;
            align-items: center;
            margin-right: 0;
            width: 90%;
            height: 40px;
        }
        .form-control1 {
            justify-content: space-between;
            align-items: center;
            z-index: 2;
            margin-right: 5%;
            height: 40px;
        }
        .form-control2 {
            margin-left: 0;
        }
        .content{
            display: flex;
            padding: 0.5em 1.4em;
        }
    </style>
</head>
<body>
    <?php
    // Kiểm tra xem có yêu cầu gửi form để thêm dữ liệu không
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Kết nối đến cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "coffeestore";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }

        $email = $_POST['email'];
        $name = $_POST['name'];
        $message = $_POST['message'];

        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
        $checkExistQuery = "SELECT * FROM tbl_lienhe WHERE email = '$email'";
        $result = $conn->query($checkExistQuery);
        if ($result->num_rows > 0) {
            echo "Email đã tồn tại trong cơ sở dữ liệu.";
        } else {
            // Thêm dữ liệu liên hệ
            $insertQuery = "INSERT INTO tbl_lienhe (email, name, message) VALUES ('$email', '$name', '$message')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "<script type='text/javascript'>alert('Thêm dữ liệu thành công')
                window.location.href='danhsachlienhe.php';
                </script>";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        // Đóng kết nối
        $conn->close();
    }
    ?>
    <div class="container">
    <h1 style="text-align: center;">Thêm liên hệ</h1>
    <form method="POST" action="">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required><br>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" required><br>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" name="message" required></textarea><br>
        </div>
        <div class="content">
            <br><input style="padding: 0.25em 1.4em;margin-left: 75%;" type="submit" value="Thêm">
            <a style="color: #fff;padding: 0.7em 0.5em;margin-left: 3%;" href = "danhsachlienhe.php">Quay lai</a>
        </div>
    </form>
    </div>
    
</body>
</html>