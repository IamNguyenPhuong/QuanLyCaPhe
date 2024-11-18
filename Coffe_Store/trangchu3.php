<?php
session_start();
if(isset($_GET['done'])){
    unset($_SESSION['cart']);
    echo'<script>alert("Mua Hàng Thành Công!");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Quán Cà Phê</title>
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

        .product-block {
            text-align: center;
            margin: 0;
            padding: 0;

        }
        .product-block img {
            width: 500px;
            height: 350px;
            object-fit : cover;
        }

        /* Left Advertisement Block Styles */
        .left-ad-block {
            justify-content: space-between;
            align-items: center;
            color: #f0f0f0;
            background-color: #746d42;
            display: flex;
            flex: 2;
            margin: 0;
            padding: 0;
            text-align: left;
        }

        .left-ad-block img {
            width: 50%;
            height: auto;
        }

        .left-ad-block p {
            color: #f0f0f0;
            display: inline;
            margin-right: 5px;
        }
        .left-ad-block h3 {
            margin-right: 5px;
            margin-right: 5px;
        }
        /* Middle Product Block Styles */
        .middle-product-block {
            justify-content: space-between;
            align-items: center;
            color: #f0f0f0;
            background-color: #9bc58a;
            display: flex;
            flex-direction: row-reverse;
            flex: 2;
            margin: 0;
            padding: 0;
            text-align: right;
        }

        .middle-product-block img {
            width: 60%;
            height: auto;
            text-align: right;
        }

        .middle-product-block p {
            margin-left: 5px;
        }
        .middle-product-block h3 {
            margin-left: 5px;
            margin-right: 5px;
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
        .left-ad-block{
            font-size: 10px;
        }
        .middle-product-block{
            font-size: 9px;
        }
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
        .left-ad-block{
            font-size: 20px;
        }
        .middle-product-block{
            font-size: 16px;
        }
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
    </style>
    <style>
        .mySlides {
            display: none;
            z-index: 1;
        }
        img {
            vertical-align: middle;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        /* Slideshow container */
        .slideshow-container {
            width: 100%;
            height: 100%;
            position: relative;
            margin: auto;
        }
        
        /* Next & previous buttons */
        .prev, .next {
          cursor: pointer;
          position: absolute;
          top: 50%;
          width: auto;
          padding: 0.25em;
          margin-top: -22px;
          color: white;
          font-weight: bold;
          font-size: 18px;
          transition: 0.6s ease;
          border-radius: 0 3px 3px 0;
          user-select: none;
        }
        
        /* Position the "next button" to the right */
        .next {
          right: 0;
          border-radius: 3px 0 0 3px;
        }
        
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
          background-color: rgba(0,0,0,0.8);
        }
        
        /* Caption text */
        .text {
          color: #f2f2f2;
          font-size: 15px;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: center;
        }
        
        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }
        
        /* The dots/bullets/indicators */
        .dot {
          cursor: pointer;
          height: 0.5em;
          width: 0.5em;
          margin: 0 0.1em;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }
        
        .active, .dot:hover {
          background-color: #717171;
        }
        
        /* Fading animation */
        .fade {
          animation-name: fade;
          animation-duration: 1.5s;
        }
        
        @keyframes fade {
          from {opacity: .4} 
          to {opacity: 1}
        }
        
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .prev, .next,.text {font-size: 11px}
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
                        <a class="row" href="http://localhost/QuanLyCaPhe/Coffe_Store/cart.php" ><img src="https://banner2.cleanpng.com/20180705/azf/kisspng-shopping-cart-software-computer-icons-shopping-icon-5b3eb003bbc062.574139001530834947769.jpg" alt=""></a>
                        
                    <?php
                        
                        if(isset($_SESSION['username'])){
                            echo "Xin chào, ".$_SESSION['username']."!";
                            echo "<br><a href='DANGNHAP/logout.php'>Đăng xuất</a>";
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
                    <a href="http://localhost/QuanLyCaPhe/Coffe_Store/trangchu3">Trang chủ</a>
                    <a href="#">Tin tức</a>
                    <a href="http://localhost/QuanLyCaPhe/Coffe_Store/categories.php">Danh mục</a>
                    <a href="http://localhost/QuanLyCaPhe/Coffe_Store/menu.php">Menu</a>
                    <a href="http://localhost/QuanLyCaPhe/Coffe_Store/TAIKHOAN/account.php">Quản lý tài khoản</a>
                    <a href="http://localhost/QuanLyCaPhe/Coffe_Store/Tintuc/tuyendung.php">Tuyển dụng</a>
                </div>
            </nav>
        </header>
    </div>
    

    <!-- Main Content -->
    <main>
        <div class="slideshow-container">

            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="images/image0.jpg">
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="images/image4.jpg" >
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="images/image5.jpg" >
            </div>
            
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
        
        <div class="content-block">
            <!-- Left Advertisement Block -->
            <div class="left-ad-block">
                <img src="images/caffee8.jpg" alt="Advertisement 1">
                <p>
                    <h3>Giới thiệu các loại cà phê mới</h3><br>
                    <div style="size: 12%;" class="left-ad-block1">
                        <h4>Cà phê sữa đá</h4>
                        <br><p>Cà phê sữa Việt Nam khác biệt so với những nước trên thế giới. 
                            Nó mang nét mộc mạc, lắng đọng...</p>
                        <a style="text-decoration:none;color: #f0f0f0;" href="../Tintuc/tintuc1.html">(Xem thêm)</a><br><br>
                        <h4>Cà phê Espresso</h4>
                        <br><p>Cafe Espresso (còn được gọi là cà phê kem), cách pha chế loại 
                            cà phê này rất cầu kỳ,...</p>
                        <a style="text-decoration:none;color: #f0f0f0;" href="../Tintuc/tintuc1.html">(Xem thêm)</a><br><br>
                        <br><h4>Cà phê Mocha</h4>
                        <br><p>Cafe Mocha có hương thơm nhẹ nhàng của cafe kết hợp với vị béo
                             của kem và chocolate,...</p>
                        <a style="text-decoration:none;color: #f0f0f0;" href="../Tintuc/tintuc1.html">(Xem thêm)</a>
                    </div>
                </p>
            </div>

            <!-- Middle Product Block -->
            <div class="middle-product-block">
                <img src="images/caffee6.jpg" alt="Product Image">
                <p>
                    <h3>Giới thiệu thương hiệu</h3><br>
                    <div style="size: 12%;" >
                        <h4>1. CHẤT LƯỢNG HÀNG ĐẦU</h4>
                        <br><p>An toàn, vệ sinh và ngon miệng. Việc sử dụng các nguyên liệu
                             an toàn, tự nhiên và vệ sinh là ưu tiên hàng đầu của Coffee. 
                             Hương vị tuyệt hảo của các món thức uống là mục đích quan trọng
                              tiếp theo mà chúng tôi muốn hướng đến.</p>
                        <br><h4>2. DỊCH VỤ THÂN THIỆN & CHUYÊN NGHIỆP</h4>
                        <br><p>Coffee mong muốn làm hài lòng khách hàng tốt nhất với tác 
                            phong phục vụ chuyên nghiệp và thân thiện, luôn lắng nghe những 
                            đóng góp của khách hàng.</p>
                        <br><h4>3. THƯƠNG HIỆU ĐÁNG TIN CẬY</h4>
                        <br><p>Dựa trên hai nền tảng cốt lõi là Chất Lượng và Dịch Vụ, 
                            Coffee luôn nỗ lực xây dựng và duy trì hình ảnh thương hiệu
                             đáng tin cậy trong mắt khách hàng.</p>
                    </div>
                </p>
            </div>
        </div>
        <script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
        }
        </script>
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
                <a style="color: #f0f0f0;margin-right: 20%;" href="quanlylienhe/them.php">Liên hệ</a>
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