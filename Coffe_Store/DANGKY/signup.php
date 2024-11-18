<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Đăng ký tài khoản</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        #wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-reg {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-reg h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #ff6b6b;
        }

        .form-check {
            margin-right: 20px;
        }

        .btn-reg {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #ff6b6b;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-reg:hover {
            background-color: #ff5252;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <div class="container">
            <div class="row justify-content-around">
                <form action="reg.php" id="form_reg" class="form-reg col-md-6 bg-light p-3 my-3" method="post">
                    <h1 class="text-center text-uppercase h3 py-3">Đăng ký tài khoản</h1>
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" id="male" value="male" class="form-check-input" checked>
                                <label for="male" class="form-check-label">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" id="female" value="female" class="form-check-input">
                                <label for="female" class="form-check-label">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="form-group mt-3 text-center"> 
                        <input type="submit" name="btn-reg" value="Đăng ký" class="btn-reg btn btn-block w-100"> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
