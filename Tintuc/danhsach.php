<style>
     h1 {
  color: #333;
  font-size: 30px;
  text-align: center;
}
table {
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #ccc;
  padding: 8px;
}

thead {
  background-color: #ccc;
}

a {
  text-decoration: none;
  color: blue;
  margin-right: 10px;
}

.form {
  margin-top: 20px;
}

.form-input {
  display: block;
  margin: 8px;
}
</style>

<?php
    $conn = mysqli_connect("localhost","root","","coffeestore");

    if(!$conn){
        die("Ket noi that bai: " . mysqli_connect_error());
    }
echo "<h1> Danh sách người tuyển dụng </h1>";

    $sql1 = "SELECT * FROM tbl_tuyendung";

    $result1 = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result1) > 0){
                echo "<table>";
             echo "<thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead> 

            <tbody> ";
            while($row1 = mysqli_fetch_assoc($result1)){
                echo "<tr>";
                    echo '<td>' . $row1['HoTen'] . "</td>";
                    echo '<td>' . $row1['NgaySinh'] . "</td>";
                    echo '<td>' . $row1['DiaChi'] . "</td>";
                    echo '<td>' . $row1['Email'] . "</td>";
                    echo '<td>' . $row1['SoDienThoai'] . "</td>";
                    echo "<td> <a href='./Suathongtin.php?HoTen=".$row1["HoTen"]."'>Sửa</a>
                               <a onClick = \"javascript: return confirm('Bạn có muốn xóa không');\"
                               href = 'Xoathongtin.php?HoTen=".$row1["HoTen"]."'>Xóa</a>
                </td>";
                               
                echo "</tr>";

            }
            echo "</tbody>";
      echo "</table>";
    }
?>
<p><a href=nopdon.php>
    Thêm 
</a></p>
<a href="timkiem.php">
    Tìm kiếm
</a><br>
<a href = "../trangchu/trangchuquanly.php">Quay lai</a>



