<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kho</title>
  
</head>
<body>
    
</body>
</html>

<html>
<head>
    <title>Danh sách nguyên liệu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h3 {
            font-size: 30px;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #333;
            color: white;
        }
        form {
            text-align: center;
            margin: 20px auto;
        }
        input[type="text"], input[type="date"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin: 5px;
        }
        input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        a {
            text-decoration: none;
            color: #333;
        }
        a:hover {
            text-decoration: underline;
        }
        a.add-button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            display: block;
            width: 100px;
            margin: 10px auto;
            text-align: center;
        }
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

            /* Global Styles */
        body {
            height:100%;
            position: relative;
            background-position: center !important;
            font-family: 'Times New Roman', Times, serif, sans-serif;
            background-color: #bebebe;
        }

        .container {
            min-height: 150vh; /* will cover the 100% of viewport */
            overflow: hidden;
            display: block;
            position: relative;
            padding-bottom: 100px; /* height of your footer */
            width: 100%; 
        }

        header {
            position: relative;
            background-color: #0f7f2a;
            padding: 10px 0;
        }
        #body {
            padding:10px;
            padding-bottom:60px;   /* Height of the footer */
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

        /* Content Block Styles */
        .content-block {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        /* Footer Styles */
        footer {
            position:absolute;
            bottom:0;
            width:100%;   /* Height of the footer */
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
            background-color: #000000;
            color: #135d24;
            width: 200px;
            overflow-y: auto;
            transition: left 0.3s; /* thời gian hiệu ứng */
        }

        .menu-list a {
            z-index: 2;
            color: #ffffff;
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
    </style>
</head>
<body>
    <!-- Header -->
    <?php 
if(isset($_SESSION['usernamenhanvien'])){
    // echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchunhanvien.php">Quay lại</a>';
    include'../header/header2.php';

}
else if(isset($_SESSION['usernameadmin'])){
    // echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchuquanly.php">Quay lại</a>';
    include'../header/header1.php';
}
?>
   
    <div class="container">
    <h3>Danh sách nguyên liệu trong kho</h3><br>
    

    <!-- Nút "Thêm" để chuyển đến trang "them.php" -->
    <a class="add-button" href="them.php">Thêm</a>

    <!-- Biểu mẫu tìm kiếm -->
    <form method="get">
        <input type="text" name="search" placeholder="Tìm kiếm theo Tên hoặc Nhà sản xuất">
        <input type="date" name="ngay_mua" placeholder="Tìm kiếm theo Ngày">
        <input type="submit" value="Tìm kiếm">
    </form>

    <?php
    // Kết nối tới cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "coffeestore";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Xử lý tìm kiếm dựa trên tên hoặc tên nhà sản xuất
    if (isset($_GET["search"]) && !empty($_GET["search"])) {
        $search = $_GET["search"];
        // Truy vấn cơ sở dữ liệu để tìm kiếm theo Tên hoặc Nhà sản xuất
        $sql = "SELECT * FROM tbl_kho WHERE
                ten_nguyen_lieu LIKE '%$search%' OR
                don_vi_cung_cap LIKE '%$search%'";
    } elseif (isset($_GET["ngay_mua"]) && !empty($_GET["ngay_mua"])) {
        $ngay_mua = $_GET["ngay_mua"];
        // Truy vấn cơ sở dữ liệu để tìm kiếm theo Ngày mua
        $sql = "SELECT * FROM tbl_kho WHERE
                ngay_mua = '$ngay_mua'";
    } else {
        // Truy vấn cơ sở dữ liệu để lấy danh sách nguyên liệu theo FIFO - Ngược lại
        $sql = "SELECT * FROM tbl_kho ORDER BY ngay_mua DESC";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Tên nguyên liệu</th>
                    <th>Ngày mua</th>
                    <th>Số lượng</th>
                    <th>Đơn vị đo</th>
                    <th>Đơn vị cung cấp</th>
                    <th>Thao tác</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["ten_nguyen_lieu"] . "</td>
                    <td>" . $row["ngay_mua"] . "</td>
                    <td>" . $row["so_luong"] . "</td>
                    <td>" . $row["don_vi"] . "</td>
                    <td>" . $row["don_vi_cung_cap"] . "</td>
                    <td>
                        <a href='sua.php?id=" . $row["id"] . "'>Sửa</a>
                        <a href='xoa.php?id=" . $row["id"] . "'>Xoá</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Không tìm thấy kết quả.";
    }

    // Đóng kết nối
    $conn->close();
    ?>
    </div>
    <footer>
        <div class="footer-content">
            <!-- Footer Information Block -->
            <div class="footer-info">
                <h1>Coffee</h1>
                <p>Địa chỉ: Đường Tân Triều, Quận Thanh Xuân, Thành phố Hà Nội</p>
                <p>Số điện thoại: 0123 456 789</p>
                <p>Email: Coffee@email.com</p>
            </div>

            <!-- Contact Button and Form Block -->
            <div class="footer-contact">
                <div class="footer img">
                    <img src="https://t4.ftcdn.net/jpg/05/14/51/79/360_F_514517927_dXLi1DauUmrCaE3AkElsVgJ1jaYZMcSA.jpg" alt="Coffee Shop Logo">
                </div>
                
                
            </div>
        </div>
    </footer>
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
    <script>
    function del(name){
        return confirm("Bạn có muốn xóa: "+name+ "?");
    }
    </script>
</body>
</html>