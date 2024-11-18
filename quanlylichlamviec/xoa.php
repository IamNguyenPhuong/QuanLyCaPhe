<?php
    include "connect.php";
    $MaNV= $_GET['MaNV'];
    $sql="DELETE FROM tbl_ttnv where MaNV='$MaNV' ";
    $result= mysqli_query($conn,$sql);
    if(!$result){
        echo "Delete error" . mysqli_error($conn);
    }
    else{
        echo "<script type='text/javascript'>alert('Xóa dữ liệu thành công')
        window.location.href='quanlylichlamviec.php';
        </script>";
    }

?>