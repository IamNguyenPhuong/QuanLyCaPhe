<?php
$conn = mysqli_connect("localhost","root","","coffeestore");
// Check connection
if (mysqli_connect_errno())
{
echo "Kết nối đến MySQL thất bại: " . mysqli_connect_error();
}
?>