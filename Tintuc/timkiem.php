<h1>Nhập vào họ tên để tìm kiếm: </h1><br>
<a href="danhsach.php">Quay lại</a>
<form action="" method="post">
<input type="text" name="search">
<input type="submit" name="submit" value="Search">
<style>
   
    input[type="text"]{
            width: 400px;
    }
input[type="submit"]{
            -moz-box-shadow:inset 0px 1px 0px 0px #fceaca;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fceaca;
	box-shadow:inset 0px 1px 0px 0px #fceaca;
	background-color:#ffce79;
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0;
	border:1px solid #eeb44f;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	font-style:normal;
	height:50px;
	line-height:50px;
	width:131px;
	text-decoration:none;
	text-align:center;
	text-shadow:-17px -2px 9px #ce8e28;
    
        }
        table,th,td{
            width: 500px;
            border: 1px solid black;
        }

    </style>
</form>
<?php
$servername='localhost';
$username='root'; // User mặc định là root
$password='';
$dbname = "coffeestore"; // Cơ sở dữ liệu
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die('Không thể kết nối Database:' );
}
    if(ISSET($_POST['submit'])){
        $keyword = $_POST['search'];
?>
<div>
    <h2>Kết quả</h2>
    <?php
        $query = mysqli_query($conn, "SELECT * FROM tbl_tuyendung WHERE HoTen LIKE '%$keyword%' ORDER BY HoTen") or die();
        while($fetch = mysqli_fetch_array($query)){
    ?>
    <table>
        <thead>
                    <th>Họ Tên</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
        </thead>
        <tr>
        <?php echo "<td>". $fetch['HoTen']."</td>"?>
        
        <?php $NgaySinh = $fetch['NgaySinh'];
                $NgaySinhFormat = date("d/m/Y",strtotime($NgaySinh));
        
        echo "<td>".$NgaySinhFormat ."</td>"?>
        <?php echo "<td>". $fetch['DiaChi']."</td>"?>
        <?php echo "<td>". $fetch['Email']."</td>"?>
        <?php echo "<td>". $fetch['SoDienThoai']."</td>"?>
    </tr>
    </table>
   
        
    <?php
        }
    ?>
</div>
<?php
    }
?>