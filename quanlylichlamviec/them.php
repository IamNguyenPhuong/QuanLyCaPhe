<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm lịch làm việc</title>
    <style>
        * {
            box-sizing:border-box;
        }
        .container{
            max-width: 900px;
            color: #fff;
            background-color: #0f7f2a;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
        }
        .form{
            background-color: #0f7f2a;
            justify-content: space-between;
            align-items: center;
        }
        .form-group{
            justify-content: space-between;
            align-items: center;
            z-index: 1;
            display: flex;
            background-color: #0f7f2a;
            padding: 0.7em 0.5em;
        }
        .form-control {
            justify-content: space-between;
            align-items: center;
            margin-right: 0;
            width: 90%;
            height: 40px;
        }
        .form-control1 {
            justify-content: space-between;
            align-items: center;
            z-index: 2;
            margin-right: 5%;
            height: 40px;
        }
        .form-control2 {
            margin-left: 0;
        }
        .content{
            display: flex;
            padding: 0.5em 1.4em;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Thêm lịch làm việc</h1>
        <form action="them.php" method="post">
            <div class="form-group">
                <label class="form-control2" for="MaNV">Mã nhân viên:</label>
                <input type="text"  class="form-control" name="MaNV" required>
            </div>
            <div class="form-group">
                <label for="HoTen">Tên nhân viên:</label>
                <input type="text" class="form-control" name="HoTen" required>
            </div>
            <div class="form-group">
                <label for="CongViec">Công việc:</label>
                <select class="form-control" name="CongViec">
                    <option value="0">Quản lý</option>
                    <option value="1">Phục vụ</option>
                    <option value="2">Pha chế</option>
                </select>
            </div>
            <div class="form-group">
                <label for="NgayLam">Ngày làm:</label>
                <input type="date" class="form-control" name="NgayLam" required>
            </div>
            <div class="form-group">
                <label for="CaLam">Ca Làm:</label>
                <input type="text" class="form-control" name="CaLam" required>
            </div>
            <div class="content">
                <button style="padding: 0.25em 1.4em;margin-left: 75%;" type="submit" ID="btnGhi" name = "btnGhi">Ghi</button>
                <a style="color: #fff;padding: 0.7em 0.5em;margin-left: 3%;" href = "quanlylichlamviec.php">Quay lai</a>
            </div>
            
        </form>
    </div>
    <script>
        function validateForm() {
            var MaNV = document.forms["nhanVienForm"]["MaNV"].value;

            var isDuplicate = false;
            var duplicateMessage = "Kiểm tra trùng lặp: ";

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "coffeestore";
            $conn = new mysqli($servername, $username, $password, $dbname);

            $sql_all_MaNV = "SELECT MaNV FROM tbl_ttnv";
            $result_all_MaNV = $conn->query($sql_all_MaNV);
            while($row = $result_all_MaNV->fetch_assoc()) {
                echo "if (MaNV === '".$row["MaNV"]."') { isDuplicate = true; duplicateMessage += 'Mã nhân viên, '; }";
            }

            if (empty($MaNV) || empty($HoTen)) {
                echo "Mã nhân viên, tên nhân viên không được để trống.";
            } else {
                if ($result_check_MaNV->num_rows > 0) {
                    echo "Mã nhân viên đã tồn tại. Vui lòng chọn mã khác.";
                } else {
                    $sql = "INSERT INTO tbl_ttnv (MaNV, HoTen, CongViec, NgayLam, CaLam)
                            VALUES ('$MaNV', '$HoTen', '$CongViec', '$NgayLam', '$CaLam')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Thêm nhân viên thành công!";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
            ?>

            if (isDuplicate) {
                duplicateMessage = duplicateMessage.slice(0, -2); // Loại bỏ dấu phẩy cuối cùng
                alert(duplicateMessage);
                return false;
            }
        }
    </script>
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
        $CongViec = $_POST['CongViec'];
        $NgayLam = $_POST['NgayLam'];
        $CaLam = $_POST['CaLam'];

        if (empty($MaNV)) {
            echo "Mã nhân viên không được để trống.";
        } else {
            $sql_check_MaNV = "SELECT * FROM tbl_ttnv WHERE MaNV = '$MaNV'";
            $result_check_MaNV = $conn->query($sql_check_MaNV);

            if ($result_check_MaNV->num_rows > 0) {
                echo "Mã nhân viên đã tồn tại. Vui lòng chọn mã khác.";
            } else {
                $sql = "INSERT INTO tbl_ttnv(MaNV,HoTen,CongViec,NgayLam,CaLam) VALUES ('$MaNV','$HoTen','$CongViec','$NgayLam','$CaLam')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script > alert('Thêm thành công');
                    window.location.href='quanlylichlamviec.php';
                    </script>";
                } else {
                    echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
        $conn->close();
    }
    ?>
</body>
</html>