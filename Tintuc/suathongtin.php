<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin</title>
    <style>
h1 {
    color: #333;
  font-size: 30px;
  text-align: center;
}

table {
  border-collapse: collapse;
  width: 50%;
  margin: 0 auto;
  margin-top: 50px;
}

td, th {
  border: 1px solid #ccc;
  padding: 8px;
}

input {
  width: 100%;
  padding: 8px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

.form {
  margin-top: 20px;
}

.form-input {
  display: block;
  margin: 8px;
}
</style>
</head>
<body>
    <!-- Lay Du Lieu -->
    <?php
        $HoTen = $_GET['HoTen'];
        $NgaySinh = "";
        $DiaChi = NULL;
        $Email = NULL;
        $SoDienThoai = NULL;

        $conn = mysqli_connect("localhost", "root","","coffeestore");
        if(!$conn){
            echo "Ket noi that bai";
        }
        $sql = "SELECT * FROM tbl_tuyendung WHERE HoTen = '".$HoTen."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $HoTen = $row["HoTen"];
                $NgaySinh = $row["NgaySinh"];
                $DiaChi = $row["DiaChi"];
                $Email = $row["Email"];
                $SoDienThoai = $row["SoDienThoai"];
            }
            
        }else{
            echo "Khong co ban ghi";
        }
    ?>

    <!-- Giao dien  -->
    <h1>Sửa thông tin</h1>
    <form method = "POST">
            <table>
                <tbody>
                <tr>
                    <td>Họ tên</td>
                    <td><input type="text" name = "txtHoTen" value = "<?php echo($HoTen) ?>" readonly></td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="datetime" name = "txtNgaySinh" value = "<?php echo($NgaySinh) ?>" ></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name = "txtDiaChi" value= "<?php echo($DiaChi) ?>"></td>
                
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name = "txtEmail" value = "<?php echo($Email) ?>"></td>
                    
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="text" name = "txtSoDienThoai" value = "<?php echo($SoDienThoai) ?>"></td>
                    
                </tr>

                <tr>
                    <td></td>
                    <td><button type ="submit" id = "btnGhi" name = "btnGhi">Ghi dữ liệu</button></td>
                </tr>
                </tbody>
               

            </table>

    </form>

    <?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btnGhi'])){
        $HoTen = $_POST['txtHoTen'];
        $NgaySinh = $_POST['txtNgaySinh'];
        $DiaChi = $_POST['txtDiaChi'];
        $Email = $_POST['txtEmail'];
        $SoDienThoai = $_POST['txtSoDienThoai'];
        $conn = mysqli_connect("localhost","root","","coffeestore");
        if(!$conn){
            echo "Ket noi that bai";
        }
        $sql = "UPDATE tbl_tuyendung SET HoTen = '".$HoTen."', NgaySinh = '".$NgaySinh."', DiaChi = '".$DiaChi."',Email = '".$Email."', SoDienThoai = '".$SoDienThoai."' WHERE HoTen = '".$HoTen."'";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            echo "Update Error" ;//. mysqli_error($conn);
        }else{
            echo "<script type = 'text/javascript'>alert('Cap nhat du lieu thanh cong');
            window.location.href = 'danhsach.php';
            </script>";
        }
        //mysqli_close($conn);
    }
    
    
    ?>
    <a href = "danhsach.php">Quay lai</a>
</body>
</html>