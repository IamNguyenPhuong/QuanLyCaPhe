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
    <title>Danh sách nhân viên</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Danh sách nhân viên</h1>

    <?php
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli("localhost", "username", "password", "database");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Truy vấn dữ liệu từ bảng tbl_ttnv
    $sql = "SELECT * FROM tbl_ttnv";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Mã NV</th><th>Họ Tên</th><th>Giới Tính</th><th>Năm Sinh</th><th>Số Điện Thoại</th><th>Email</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["MaNV"] . "</td>";
            echo "<td>" . $row["HoTen"] . "</td>";
            echo "<td>" . $row["GioiTinh"] . "</td>";
            echo "<td>" . $row["NamSinh"] . "</td>";
            echo "<td>" . $row["SoDienThoai"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Không tìm thấy dữ liệu.";
    }

    $conn->close();
    ?>
</body>
</html>