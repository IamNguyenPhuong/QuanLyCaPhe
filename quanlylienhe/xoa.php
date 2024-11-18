<?php
if (isset($_GET["email"])) {
    $email = $_GET["email"];
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "coffeestore";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
        // Xóa dữ liệu liên hệ
    $sql = "DELETE FROM tbl_lienhe WHERE email = '$email'";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Xóa dữ liệu thành công')
        window.location.href='danhsachlienhe.php';
        </script>";
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
    // Đóng kết nối
    $conn->close();
}
    ?>