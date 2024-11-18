<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phấm</title>
</head>
<body>
    
</body>
</html>

<html>
<head>
    <title>Thêm nguyên liệu mới</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        form {
            background-color: white;
            width: 400px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin: 10px 0;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], input[type="number"], select {
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
    
</head>
<body>
    <h1>Thêm nguyên liệu mới</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Xử lý dữ liệu gửi từ biểu mẫu khi nút "Thêm" được nhấn
        $ten_nguyen_lieu = $_POST["ten_nguyen_lieu"];
        $ngay_mua = $_POST["ngay_mua"];
        $so_luong = $_POST["so_luong"];
        $don_vi = $_POST["don_vi"];
        $don_vi_cung_cap = $_POST["don_vi_cung_cap"];

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

        // Thêm dữ liệu mới vào bảng "tbl_kho"
        $sql = "INSERT INTO tbl_kho (ten_nguyen_lieu, ngay_mua, so_luong, don_vi, don_vi_cung_cap) 
                VALUES ('$ten_nguyen_lieu', '$ngay_mua', $so_luong, '$don_vi', '$don_vi_cung_cap')";

        if ($conn->query($sql) === TRUE) {
            // Sau khi thêm thành công, chuyển hướng về trang "kho.php"
            header("Location: kho.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        // Đóng kết nối
        $conn->close();
    }
    ?>

    <form method="post" action="them.php">
        <label for="ten_nguyen_lieu">Tên nguyên liệu:</label>
        <input type="text" name="ten_nguyen_lieu" required><br>

        <label for="ngay_mua">Ngày mua:</label>
        <input type="date" name="ngay_mua" required><br>

        <label for="so_luong">Số lượng:</label>
        <input type="number" name="so_luong" step="0.01" required><br>

        <label for="don_vi">Đơn vị đo:</label>
        <input type="text" name="don_vi" required><br>

        <label for="don_vi_cung_cap">Đơn vị cung cấp:</label>
        <input type="text" name="don_vi_cung_cap" required><br>

        <input type="submit" value="Thêm">
    </form>
</body>
</html>