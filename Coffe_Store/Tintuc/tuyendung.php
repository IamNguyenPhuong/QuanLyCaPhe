<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tuyển dụng nhân viên làm việc tại quán cà phê</title>
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
            width:80px;
            height: auto;
            margin-right: 10px;
        }

         .row {
            align-items: center;
         }
         .row img{
            width: 50px;
            height: auto;
            margin-bottom: -10px;
         }
        
        .shop-info {
            text-align: right;
            margin-top: -30px;
        }

        .shop-info h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .actions {
            margin-top: 10px;
        }

        .actions a {
            text-decoration: none;
            color: #ffffff;
            font-size: 16px;
            margin-right: 20px;
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

        nav ul {
            margin: auto;
            list-style-type: none;
            display: flex;
        }

        nav ul li {
            margin-left: 50px;
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

        /* Menu Button Styles */
        .menu-button {
            font-size: 24px;
            cursor: pointer;
            margin-right: 20px;
            padding: 5px 10px;
            background-color: #2cb541;
            border: none;
            color: #ffffff;
            border-radius: 5px;
        }

        /* Menu List Styles */
        .menu-list {
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
            color: #000000;
            padding: 10px 20px;
            text-decoration: none;
            display: block;
        }

        /* Hiển thị menu khi được mở */
        .show-menu .menu-list {
            left: 0;
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
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .contact-form textarea {
            height: 100px;
        }

        .contact-form button {
            background-color: #2cb541;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-family: 'Times New Roman', Times, serif;
        }

    </style>
</head>
<body>
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
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/trangchu3.php">Trang chủ</a>
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/Tintuc/tintuc1.php">Tin tức</a>
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/categories.php">Danh mục</a>
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/menu.php">Menu</a>
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/TAIKHOAN/account.php">Quản lý tài khoản</a>
                <a href="http://localhost/QuanLyCaPhe/Coffe_Store/tuyendung.php">Tuyển dụng</a>
                </div>
            </nav>
    </header>

    <!-- Main Content -->
    <main>
        <br>
        <p>
				<h2>Tuyển dụng nhân viên phục vụ</h2>
				<p>Chúng tôi đang cần tuyển dụng những ứng viên có đam mê với công việc phục vụ khách hàng tại quán cà phê của chúng tôi. Nếu bạn là người có tinh thần trách nhiệm, tận tâm với khách hàng và muốn làm việc trong môi trường cà phê thân thiện, hãy nộp đơn tại địa chỉ sau:</p>
				<p>Địa chỉ: Đường Tân Triều, Quận Thanh Xuân, Thành phố Hà Nội</p>
				<p>Email: Coffee@email.com</p>
				<p>Điện thoại: 012 345 6789</p>
			
			<main>
				<h3>Vị trí tuyển dụng</h3>
				<p>- Nhân viên phục vụ</p>
				<h3>Yêu cầu công việc</h3>
				<ul>
					<li>Có kinh nghiệm trong lĩnh vực phục vụ khách hàng</li>
					<li>Tiếng Anh giao tiếp tốt</li>
					<li>Có thể làm việc linh động vào các ca làm việc khác nhau</li>
					<li>Thân thiện, vui vẻ và nhiệt tình với khách hàng</li>
				</ul>
				<h3>Quyền lợi của nhân viên</h3>
				<ul>
					<li>Lương cạnh tranh</li>
					<li>Chế độ bảo hiểm đầy đủ</li>
					<li>Chế độ nghỉ phép theo quy định</li>
					<li>Thưởng cuối năm</li>
				</ul>
				<h3>Cách thức nộp đơn</h3>
				<p>Ứng viên có thể nộp đơn trực tiếp tại quán cà phê hoặc gửi qua đường link dưới đây</p>
				<a href="nopdon.php">Link</a>
			</main>
			
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