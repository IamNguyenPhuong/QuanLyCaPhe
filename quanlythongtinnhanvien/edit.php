<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_Staff</title>
</head>
<body>
    
</body>
</html>

<html>
<head>
    <title>Sửa Nhân Viên</title>

    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

/* Container for Add Employee and Employee List */
#container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 20px;
}

#add-employee, #employee-list, #edit-employee {
    background-color: #fff;
    border: 1px solid #000;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 0 auto;
}

#add-employee {
    margin-right: 20px;
}

#add-employee h1, #employee-list h1, #edit-employee h1 {
    font-size: 20px;
    margin-bottom: 20px;
    text-align: center;
}

/* Edit Employee Form styles */
#edit-employee {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 300px;
    margin: 0 auto;
}

/* Form styles */
form {
    text-align: center;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
input[type="email"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

select {
    padding: 5px;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}

/* Employee Table styles */
table {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

table, th, td {
    border: 1px solid #000;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

/* Cuộn danh sách nếu có quá 10 dòng */
@media (max-height: 400px) {
    #employee-list {
        max-height: 200px;
        overflow-y: auto;
    }
}

/* Responsive design */
@media (max-width: 600px) {
    #container {
        flex-direction: column;
    }

    #add-employee, #employee-list, #edit-employee {
        width: 100%;
    }
}

    </style>

</head>
<body>
    <h1>Sửa Nhân Viên</h1>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffeestore";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaNV = $_POST['MaNV'];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NamSinh = $_POST['NamSinh'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $Email = $_POST['Email'];

    if (empty($MaNV) || empty($SoDienThoai) || empty($Email)) {
        echo "Mã nhân viên, số điện thoại và email không được để trống.";
    } else {
        if (preg_match("/^\d{10}$/", $SoDienThoai)) {
            $sql_check_MaNV = "SELECT * FROM tbl_ttnv WHERE MaNV = '$MaNV'";
            $result_check_MaNV = $conn->query($sql_check_MaNV);

            $sql_check_Email = "SELECT * FROM tbl_ttnv WHERE Email = '$Email' AND MaNV <> '$MaNV'";
            $result_check_Email = $conn->query($sql_check_Email);

            $sql_check_SoDienThoai = "SELECT * FROM tbl_ttnv WHERE SoDienThoai = '$SoDienThoai' AND MaNV <> '$MaNV'";
            $result_check_SoDienThoai = $conn->query($sql_check_SoDienThoai);

            if ($result_check_Email->num_rows > 0) {
                echo "Email đã tồn tại cho một nhân viên khác. Vui lòng sử dụng địa chỉ email khác.";
            } elseif ($result_check_SoDienThoai->num_rows > 0) {
                echo "Số điện thoại đã tồn tại cho một nhân viên khác. Vui lòng sử dụng số điện thoại khác.";
            } else {
                $sql = "UPDATE tbl_ttnv
                        SET HoTen = '$HoTen', GioiTinh = '$GioiTinh', NamSinh = '$NamSinh', SoDienThoai = '$SoDienThoai', Email = '$Email'
                        WHERE MaNV = '$MaNV'";

                if ($conn->query($sql) === TRUE) {
                    // Chuyển về trang index.php sau khi sửa thông tin thành công
                    header("Location: index.php");
                } else {
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            echo "Số điện thoại phải chứa đúng 10 số.";
        }
    }
}

$MaNV = $_GET['MaNV'];
$sql = "SELECT * FROM tbl_ttnv WHERE MaNV = '$MaNV'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>

<!-- Thêm nút Quay lại trang index.php -->
<a href="index.php">Quay lại</a>

<form method="post" action="edit.php">
    <input type="hidden" name="MaNV" value="<?php echo $row["MaNV"]; ?>">
    <label for="HoTen">Họ và Tên:</label>
    <input type="text" name="HoTen" value="<?php echo $row["HoTen"]; ?>" required><br><br>

    <label>Giới tính:</label>
    <select name="GioiTinh">
        <option value="Nam" <?php if ($row["GioiTinh"] === "Nam") echo "selected"; ?>>Nam</option>
        <option value="Nữ" <?php if ($row["GioiTinh"] === "Nữ") echo "selected"; ?>>Nữ</option>
    </select><br><br>

    <label for="NamSinh">Năm sinh:</label>
    <input type="date" name="NamSinh" value="<?php echo $row["NamSinh"]; ?>" required><br><br>

    <label for="SoDienThoai">Số điện thoại:</label>
    <input type="text" name="SoDienThoai" value="<?php echo $row["SoDienThoai"]; ?>" required maxlength="10"><br><br>

    <label for="Email">Email:</label>
    <input type="email" name="Email" value="<?php echo $row["Email"]; ?>" required><br><br>

    <input type="submit" name="submit" value="Lưu">
</form>

<?php
$conn->close();
?>
</body>
</html>
