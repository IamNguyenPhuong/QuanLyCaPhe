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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu được gửi từ biểu mẫu khi nút "Lưu" được nhấn
    $id = $_POST["id"];
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

    // Cập nhật thông tin nguyên liệu trong bảng "tbl_kho"
    $sql = "UPDATE tbl_kho SET
            ten_nguyen_lieu = '$ten_nguyen_lieu',
            ngay_mua = '$ngay_mua',
            so_luong = $so_luong,
            don_vi = '$don_vi',
            don_vi_cung_cap = '$don_vi_cung_cap'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Sau khi sửa thành công, chuyển hướng về trang "kho.php"
        header("Location: kho.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}

// Lấy thông tin nguyên liệu cần sửa từ cơ sở dữ liệu
if (isset($_GET["id"])) {
    $id = $_GET["id"];

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

    // Truy vấn cơ sở dữ liệu để lấy thông tin nguyên liệu
    $sql = "SELECT * FROM tbl_kho WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ten_nguyen_lieu = $row["ten_nguyen_lieu"];
        $ngay_mua = $row["ngay_mua"];
        $so_luong = $row["so_luong"];
        $don_vi = $row["don_vi"];
        $don_vi_cung_cap = $row["don_vi_cung_cap"];
    } else {
        echo "Không tìm thấy nguyên liệu.";
        exit();
    }

    // Đóng kết nối
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<html>
<head>
    <title>Chỉnh sửa nguyên liệu</title>
</head>
<body>
    <h1>Chỉnh sửa nguyên liệu</h1>
    <form method="post" action="sua.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="ten_nguyen_lieu">Tên nguyên liệu:</label>
        <input type="text" name="ten_nguyen_lieu" value="<?php echo $ten_nguyen_lieu; ?>" required><br>

        <label for="ngay_mua">Ngày mua:</label>
        <input type="date" name="ngay_mua" value="<?php echo $ngay_mua; ?>" required><br>

        <label for="so_luong">Số lượng:</label>
        <input type="number" name="so_luong" step="0.01" value="<?php echo $so_luong; ?>" required><br>

        <label for="don_vi">Đơn vị đo:</label>
        <input type="text" name="don_vi" value="<?php echo $don_vi; ?>" required><br>

        <label for="don_vi_cung_cap">Đơn vị cung cấp:</label>
        <input type="text" name="don_vi_cung_cap" value="<?php echo $don_vi_cung_cap; ?>" required><br>

        <input type="submit" value="Lưu">
        <a style="color: blue;padding: 0.7em 0.5em;margin-left: 60%;" href = "kho.php">Quay lai</a>
    </form>
</body>
</html>