<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Các loại cà phê mới được xuất hiện tại quán Coffee.</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

            /* Global Styles */
        body {
            position: relative;
            background-position: center !important;
            font-family: 'Times New Roman', Times, serif, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            position: relative;
            background-color: #0f7f2a;
            padding: 10px 0;
        }
        div.sticky {
            z-index: 4;
            position: -webkit-sticky;
            position: sticky;
            top: 0;
        }

        .top-block {
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
            display: flex;
            padding: 0 20px;
            color: #ffffff;
            padding: 0 20px;
            }
            /*logo*/
        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 5em;
            margin-right: 0.5em;
        }

         .row {
            align-items: center;
         }
         .row img{
            width: 3em;
            margin-bottom: 0;
         }
        
        .shop-info {
            text-align: right;
            margin-top: -2em;
        }

        .actions {
            margin-top: 0;
        }

        .actions a {
            text-decoration: none;
            color: #ffffff;
            font-size: 16;
            margin-right: 1em;
            transition: color 0.3s;
        }

        .actions a:hover {
            color: #fbff00;
        }

        /* Navigation Bar Styles */
        nav {
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
            background-color: #0f7f2a;
            color: #fff;
            display: flex;
            padding: 0 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #fbff00;
        }

        .content-block {
            text-align:center;
            margin: 0 auto;
            padding: 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(23, 121, 33, 0.1);
        }
        
        /* Footer Styles */
        footer {
            bottom: 0;
            background-color: #0f7f2a;
            color: #fff;
            padding: 20px 0;
        }

        .footer img {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-info {
            width: 60%;
        }

        .footer-contact {
            width: 30%;
            text-align: right;
        }

        .footer-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .footer-info p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .footer-info p:last-child {
            margin-bottom: 0;
            margin-left: .25rem;
        }

        .contact-button{
            background-color: #2cb541;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-right: 15px;
            font-family: 'Times New Roman', Times, serif;
        }

        .contact:hover {
            color: #fbff00;
        }

        /* Contact Form Styles */
        .contact-form {
            display: none;
            background-color: #fff;
            border: 1px solid #ccc;
            color: #000000;
            padding: 20px;
            position: absolute;
            bottom: 0;
            right: 120px;
            width: 300px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .contact-form label {
            text-align: left;
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .contact-form input[type="text"],
        .contact-form textarea {
            width: 100%;
            padding: 0.5em;
            margin-bottom: 0.5em;
            border: 0.05em solid #000000;
            border-radius: 0.1em;
        }

        .contact-form textarea {
            height: 8em;
        }

        .contact-form button {
            background-color: #2cb541;
            color: #fff;
            border: none;
            padding: 0.5em 1em;
            border-radius: 0.2em;
            font-size: 1em;
            cursor: pointer;
            font-family: 'Times New Roman', Times, serif;
        }

        @media screen and (max-width: 800px) {
        nav ul {
            display: none;
        }

        nav ul li {
            display: none;
        }
        /* Menu Button Styles */
        .menu-button {
            font-size: 24px;
            cursor: pointer;
            padding: 0.25em 0.5em;
            background-color: #2cb541;
            border: none;
            color: #ffffff;
            border-radius: 5px;
            margin-left: 95%;
        }

        /* Menu List Styles */
        .menu-list {
            z-index: 2;
            position: fixed;
            left: -200px; /* ẩn menu ban đầu bên trái */
            top: 0;
            bottom: 0;
            background-color: #bee0c6;
            color: #135d24;
            width: 200px;
            overflow-y: auto;
            transition: left 0.3s; /* thời gian hiệu ứng */
        }

        .menu-list a {
            z-index: 2;
            color: #000000;
            padding: 10px 20px;
            text-decoration: none;
            display: block;
        }

        /* Hiển thị menu khi được mở */
        .show-menu .menu-list {
            left: 0;
        }
        }
        @media screen and (min-width: 800px) {
        nav ul {
            margin: auto;
            list-style-type: none;
            display: flex;
        }

        nav ul li {
            margin-left: 50px;
        }
        .menu-button {
            display: none;
        }

        /* Menu List Styles */
        .menu-list {
            display: none;
        }

        .menu-list a {
            display: none;
        }

        /* Hiển thị menu khi được mở */
        .show-menu .menu-list {
            display: none;
        }
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #0f7f2a;
            text-align: center;
            color: #fff;
            padding: 20px;
        }

        .coffee-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .coffee-card {
            width: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
        }

        .coffee-card h3 {
            color: #333;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .coffee-card p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .coffee-card img {
            width: 100%;
            border-radius: 5px;
        }
        .promotion-container {
        background-color: #f9f9f9;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-align: center;
        }

        .promotion-container h2 {
        font-size: 24px;
        margin-bottom: 10px;
        }

        .promotion-container p {
        font-size: 16px;
        margin-bottom: 10px;
        }

        .promotion-container .promo-code {
        background-color: #ddd;
        padding: 5px 10px;
        border-radius: 3px;
        }

        .promotion-container .order-button {
        background-color: #ff6600;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
        }
        .promotion-container .order-button:hover {
        background-color: #e65c00;
        }
        .promotion-container {
  background-color: #f9f9f9;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
  text-align: center;
}

.promotion-container h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.promotion-container p {
  font-size: 16px;
  margin-bottom: 10px;
}

.promotion-container .promo-code {
  background-color: #ddd;
  padding: 5px 10px;
  border-radius: 3px;
}

.promotion-container .order-button {
  background-color: #ff6600;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 18px;
  border-radius: 5px;
  cursor: pointer;
}

.promotion-container .order-button:hover {
  background-color: #e65c00;
}
    </style>
</head>
<body>
    <div class="sticky">
        <!-- Header -->
        <header>
            <!-- Top Block -->
            <div class="top-block">
                <div class="logo">
                    <img src="https://t4.ftcdn.net/jpg/05/14/51/79/360_F_514517927_dXLi1DauUmrCaE3AkElsVgJ1jaYZMcSA.jpg" alt="Coffee Shop Logo">
                    <h1 style="font-family: Cursive;">Coffee</h1>
                </div>
                
                <div class="shop-info">
                    <div class="actions">
                        <a class="row" href="#" ><img src="https://banner2.cleanpng.com/20180705/azf/kisspng-shopping-cart-software-computer-icons-shopping-icon-5b3eb003bbc062.574139001530834947769.jpg" alt=""></a>
                        <?php
                        
                        if(isset($_SESSION['username'])){
                            echo "Xin chào, ".$_SESSION['username']."!";
                            echo "<br><a href='/QuanLyCaPhe/Coffe_Store/DANGNHAP/logout.php'>Đăng xuất</a>";
                        } else {
                            echo '<a href="http://localhost/QuanLyCaPhe/Coffe_Store/DANGNHAP/signin.php">Đăng nhập</a>';
                            echo '<a href="http://localhost/QuanLyCaPhe/Coffe_Store/DANGKY/signup.php">Đăng kí</a>';
                        }
                    ?>
                    </div>
                </div>
                
            </div>

            <!-- Navigation Bar -->
            <nav>
                <ul>
                    <li><a href="http://localhost/QuanLyCaPhe/Coffe_Store/trangchu3.php">Trang chủ</a></li>
                    <li><a href="http://localhost/QuanLyCaPhe/Coffe_Store/Tintuc/tintuc1.php">Tin tức</a></li>
                    <li><a href="http://localhost/QuanLyCaPhe/Coffe_Store/categories.php">Danh mục</a></li>
                    <li><a href="http://localhost/QuanLyCaPhe/Coffe_Store/menu.php">Menu</a></li>
                    <li><a href="http://localhost/QuanLyCaPhe/Coffe_Store/TAIKHOAN/account.php">Quản lý tài khoản</a></li>
                    <li><a href="http://localhost/QuanLyCaPhe/Coffe_Store/Tintuc/tuyendung.php">Tuyển dụng</a></li>
                    
                </ul>
                <button class="menu-button" id="menu-toggle">&#9776;</button>
                <div class="menu-list" id="menu-list">
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/">Trang chủ</a>
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/Tintuc/tintuc1.php">Tin tức</a>
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/categories.php">Danh mục</a>
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/menu.php">Menu</a>
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/TAIKHOAN/account.php">Quản lý tài khoản</a>
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/tuyendung.php">Tuyển dụng</a>
                </div>
                <!-- <ul>
                    <li><a href="../trangchu/trangchu3.html">Trang chủ</a></li>
                    <li><a href="../Tintuc/tintuccaphe.php">Tin tức</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Đơn hàng</a></li>
                    <li><a href="../Tintuc/tuyendung.php">Tuyển dụng</a></li>
                    <li><a href="../trangchu/trangchuquanly.html">Quản lý</a></li>

                </ul>
                <button class="menu-button" id="menu-toggle">&#9776;</button>
                <div class="menu-list" id="menu-list">
                    <a href="../trangchu/trangchu3.html">Trang chủ</a>
                    <a href="../Tintuc/tintuccaphe.php">Tin tức</a>
                    <a href="#">Menu</a>
                    <a href="#">Đơn hàng</a>
                    <a href="../Tintuc/tuyendung.php">Tuyển dụng</a>
                    <a href="../trangchu/trangchuquanly.html">Quản lý</a>
                </div> -->
            </nav>
        </header>
    </div>
    
    <!-- Main Content -->
    <main>
        <p>
            <div class="promotion-container">
              <h2>Khuyến mãi Free Ship cà phê trong ngày lễ Halloween!</h2>
              <p>Áp dụng cho đơn hàng cà phê được đặt trong ngày lễ Halloween và giao hàng trong Hà Nội.</p>
            </div>
          </p>
    </main>
    
    <!-- Footer -->
    <footer>
    <div class="footer-content">
        <!-- Footer Information Block -->
        <div class="footer-info">
            <h2>Coffee</h2>
            <p>Địa chỉ: Đường Tân Triều, Quận Thanh Xuân, Thành phố Hà Nội</p>
            <p>Số điện thoại: 0123 456 789</p>
            <p>Email: Coffee@email.com</p>
        </div>
    
        <!-- Contact Button and Form Block -->
        <div class="footer-contact">
            <div class="footer img">
                <img src="https://t4.ftcdn.net/jpg/05/14/51/79/360_F_514517927_dXLi1DauUmrCaE3AkElsVgJ1jaYZMcSA.jpg" alt="Coffee Shop Logo">
            </div>
            <a style="color: #f0f0f0;margin-right: 20%;" href="http://localhost/QuanLyCaPhe/Coffe_Store/quanlylienhe/them.php">Liên hệ</a>
        </div>
    </div>
    </footer>
    
    <!-- JavaScript Code -->
    <script>
    // Lấy tham chiếu đến contact button và contact form
    const contactButton = document.getElementById("show-contact-form");
    const contactForm = document.getElementById("contact-form");
    
    // Thêm sự kiện click vào contact button để hiển thị/ẩn contact form
    contactButton.addEventListener("click", function () {
        contactForm.style.display = contactForm.style.display === "block" ? "none" : "block";
    });
    
    // Lấy tham chiếu đến close-button
    const closeButton = document.getElementById("close-contact-form");
    
    // Thêm sự kiện click vào close-button để ẩn contact form
    closeButton.addEventListener("click", function () {
        contactForm.style.display = "none";
    });
    </script>
    
    <!-- JavaScript Code -->
    <script>
    // Lấy tham chiếu đến menu-toggle và menu-list
    const menuToggle = document.getElementById("menu-toggle");
    const menuList = document.getElementById("menu-list");
    
    // Khai báo biến để kiểm tra trạng thái menu
    let menuOpen = false;
    
    // Tạo hàm để hiển thị/ẩn menu
    function toggleMenu() {
        if (menuOpen) {
            menuList.style.left = "-200px"; // Ẩn menu bên trái
        } else {
            menuList.style.left = "0"; // Hiển thị menu
        }
        menuOpen = !menuOpen; // Đảo ngược trạng thái
    }
    
    // Thêm sự kiện click vào menu-toggle
    menuToggle.addEventListener("click", toggleMenu);
    </script>
    </body>
    </html>
    