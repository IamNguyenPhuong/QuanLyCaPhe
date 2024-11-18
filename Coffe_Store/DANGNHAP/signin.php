<?php
    if(isset($_GET['login'])){
        echo'<script>alert("Đăng nhập để vào giỏ hàng!")</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">
  
</head>
<body>
    <div class="signup">
        <h1 class="signup-heading">Sign up</h1>
        <button class="signup-social">
           
            <span class="signup-social-text">Sign up with Google</span>
        </button>
        <div class="signup-or"><span>or</span></div>


        <form action="/QuanLyCaPhe/Coffe_Store/DANGNHAP/login.php"class="signup-form" autocomplete="off" method="post">
            <label for="username" class="signup-label" >Username</label>
        <input type="text" id="username"  name="username"class="signup-input" placeholder="Username">
        
        <label for="password" class="signup-label">Password</label>
        <input type="password" id="password" class="signup-input" name="password" placeholder="*******">
        
        <input type="submit" value="Đăng nhập" name="btn-reg" class="signup-submit">
        </form>


        <p class="signup-already"><span>
            Bạn chưa có tài khoản ?
        </span>
        <a href="/QuanLyCaPhe/Coffe_Store/DANGKY/signup.php " class=signup-login-link>Đăng ký</a>
        </p>
        <p class="signup-already"><span>
           
        </span>
        <a href="/QuanLyCaPhe/Coffe_Store/PASSWORD/forgot_password.php " class=signup-login-link> Quên mật khẩu ?</a>
        </p>

        
    </div>
</body>
</html>