<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('nui.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .custom-img {
            max-width: 100%;
            height: auto;
        }
        .back-to-home {
            text-align: right;
        }
    </style>
    <title>Đăng ký tài khoản</title>
</head>
<body>
<a href="/QuanLyCaPhe/Coffe_Store/trangchu3.php" class="btn btn-primary" style="position: absolute; top: 10px; right: 10px;">Trang chủ</a>
    <div class="container">
        <div class="row justify-content-around">
            <?php
               $host= "localhost";
               $username="root";
               $password="";
               $dbname="coffeestore";
               
               $conn=new mysqli($host,$username,$password,$dbname);
               
               if($conn->connect_error){
                   die("Kết nối không thành công".$conn->connect_error);
               
               }

                if (isset($_POST['btn-reg'])) {
                    $username = $_POST['username'];
                    $fullname = $_POST['fullname'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $gender = $_POST['gender'];
                    if ($password !== $confirm_password) {
                        echo "<div class='alert alert-danger' role='alert'>Mật khẩu và xác nhận mật khẩu không khớp.</div>";
                        // Chuyển hướng hoặc thực hiện hành động phù hợp khi mật khẩu không khớp
                    } else {
                        if (!empty($username) && !empty($fullname) && !empty($password) && !empty($email) && !empty($address) && !empty($gender)) {

                            // Check if email or username already exists in the database
                            $check_email_username = "SELECT * FROM tbl_coffee_users WHERE email='$email' OR username='$username'";
                            $result = $conn->query($check_email_username);
                            
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                if ($row['email'] == $email) {
                                    echo "<div class='alert alert-danger' role='alert'>Email đã tồn tại. Vui lòng chọn địa chỉ email khác.</div>";
                                }
                                if ($row['username'] == $username) {
                                    echo "<div class='alert alert-danger' role='alert'>Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.</div>";
                                }
                            } else {
                                // Email và username hợp lệ, tiếp tục xử lý đăng ký
                                $sql = "INSERT INTO tbl_coffee_users(fullname, username, password, email, address, gender) VALUES('$fullname','$username','$password','$email','$address','$gender')";
                            
                                if ($conn->query($sql) === TRUE) {
                                    echo "<div class='alert alert-success' role='alert'>Lưu dữ liệu thành công</div>";
                                } else {
                                    echo "<div class='alert alert-danger' role='alert'>Lỗi {$sql}" . $conn->error . "</div>";
                                }
                            }
                            } else {
                            echo "<div class='alert alert-warning' role='alert'>Bạn cần nhập đầy đủ thông tin trước khi đăng kí</div>";
                            }
                    }
                }
                   
            ?>
          
            <a href="signup.php" class="btn btn-secondary mt-3">Quay lại</a>
        </div>
    </div>
</body>
</html>