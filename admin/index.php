<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Quán Cà Phê</title>
    <link rel="stylesheet" href="../css/admin.css">
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
                    <a class="row" href="#" ><img src="https://banner2.cleanpng.com/20180705/azf/kisspng-shopping-cart-software-computer-icons-shopping-icon-5b3eb003bbc062.574139001530834947769.jpg" alt=""></a>
                    <a href="#">Đăng nhập</a>
                    <a href="#">Đăng kí</a>
                </div>
            </div>
            
        </div>

        <!-- Navigation Bar -->
            <nav>
                <ul>
                    <li><a href="../admin/index.php">Trang chủ</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="../admin/manage-category.php">Danh mục</a></li>
                    <li><a href="../admin/manage-menu.php">Menu</a></li>
                    <li><a href="../admin/manage-order.php">Đơn hàng</a></li>
                    <li><a href="#">Nhân viên</a></li>
                    <li><a href="../admin/summary.php">Thống kê</a></li>
                </ul>
                <button class="menu-button" id="menu-toggle">&#9776;</button>
                <div class="menu-list" id="menu-list">
                    <a href="#">Khách hàng</a>
                    <a href="#">Kho</a>
                </div>
            </nav>
    </header>

    <!-- Main Content -->
    <main>
        <br>
        <p></p>
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
                <button class="contact-button" id="show-contact-form">Liên hệ</button>
                <div class="contact-form" id="contact-form">
                    <!-- Thêm nút đóng tin nhắn -->
                    <button class="close-button" id="close-contact-form">Đóng</button>
                    <label for="name">Họ và tên:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                    <label for="message">Tin nhắn:</label>
                    <textarea id="message" name="message" required></textarea>
                    <button type="submit">Gửi</button>
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