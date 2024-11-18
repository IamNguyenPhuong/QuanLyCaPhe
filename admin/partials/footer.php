<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
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
</body>
