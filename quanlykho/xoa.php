<?php
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

    // Xoá nguyên liệu từ bảng "tbl_kho"
    $sql = "DELETE FROM tbl_kho WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Sau khi xoá thành công, chuyển hướng về trang "kho.php"
        header("Location: kho.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>