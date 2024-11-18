<?php
$HoTen = $_GET['HoTen'];
$conn = mysqli_connect("localhost", "root", "", "coffeestore");

if(!$conn){
    die("ket noi that bai");
}
else{
    $sql = "DELETE FROM tbl_tuyendung WHERE HoTen= '" .$HoTen. "'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "Delete error" . mysqli_error($conn);
    }
    else{
        echo "<script type='text/javascript'>alert('Xoá dữ liệu thành công');
        window.location.href='danhsach.php';
        </script>";
    }
}
?>