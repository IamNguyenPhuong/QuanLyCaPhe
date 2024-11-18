<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin nhân viên</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .container {
            max-width: 900px;
            color: #fff;
            background-color: #0f7f2a;
            justify-content: space-between;
            align-items: center;
            margin: 0 auto;
        }

        .form {
            background-color: #0f7f2a;
            justify-content: space-between;
            align-items: center;
        }

        .form-group {
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

        .content {
            display: flex;
            padding: 0.5em 1.4em;
        }

    </style>
</head>
<body>
    <?php
    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "coffeestore");

    if (!$conn) {
        die("Lỗi kết nối: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $MaNV = $_POST['MaNV'];
        $HoTen = $_POST['HoTen'];
        $CongViec = $_POST['CongViec'];
        $CaLam = $_POST['CaLam'];
        $TuNgay = $_POST['TuNgay'];
        $DenNgay = $_POST['DenNgay'];

        // Kiểm tra điều kiện ngày
        $timestampTuNgay = strtotime($TuNgay);
        $timestampDenNgay = strtotime($DenNgay);

        if ($timestampTuNgay > $timestampDenNgay) {
            echo "Lỗi: Ngày bắt đầu làm không được vượt quá ngày kết thúc làm.";
        } else {
            // Cập nhật thông tin nhân viên
            $sql = "UPDATE tbl_ttnv SET
                HoTen = '$HoTen',
                CongViec = '$CongViec',
                CaLam = '$CaLam',
                TuNgay = '$TuNgay',
                DenNgay = '$DenNgay'
                WHERE MaNV = '$MaNV'";

            if (mysqli_query($conn, $sql)) {
                echo "<script > alert('Cập nhật thành công');
                window.location.href='quanlylichlamviec.php';
                </script>";
                // Chuyển hướng về trang quanlylichlamviec.php sau 2 giây
                // header("refresh:2;url=quanlylichlamviec.php");
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        }
    } else {
        if (isset($_GET['MaNV'])) {
            $MaNV = $_GET['MaNV'];

            // Lấy thông tin của nhân viên cần sửa
            $sql = "SELECT * FROM tbl_ttnv WHERE MaNV = '$MaNV'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="container">
                    <h1 style="text-align: center;">Cập nhật thông tin</h1>
                    <form action="sua.php?MaNV=<?php echo $MaNV; ?>" method="post">
                        <div class="form-group">
                            <input type="hidden" name="MaNV" value="<?php echo $row['MaNV']; ?>">
                            <label for="HoTen">Họ và tên:</label>
                            <input type="text" class="form-control" name="HoTen" value="<?php echo $row['HoTen']; ?>" required><br>
                        </div>

                        <div class="form-group">
                            <br><label for="CongViec">Công việc:</label>
                            <select class="form-control" name="CongViec" required>
                                <option value="0" <?php echo ($row['CongViec'] == '0') ? 'selected' : ''; ?>>Quản lý</option>
                                <option value="1" <?php echo ($row['CongViec'] == '1') ? 'selected' : ''; ?>>Phục vụ</option>
                                <option value="2" <?php echo ($row['CongViec'] == '2') ? 'selected' : ''; ?>>Pha chế</option>
                            </select><br>
                        </div>

                        <div class="form-group">
                            <br><label for="TuNgay">Ngày làm:</label>
                            <input type="date" class="form-control" name="TuNgay" value="<?php echo date('Y/m/d', strtotime($row['TuNgay'])); ?>" required><br>
                        </div>
                        <div class="form-group">
                            <br><label for="DenNgay">Ngày làm:</label>
                            <input type="date" class="form-control" name="DenNgay" value="<?php echo date('Y/m/d', strtotime($row['DenNgay'])); ?>" required><br>
                        </div>

                        <div class="form-group">
                            <br><label for="CaLam">Ca làm:</label>
                            <input type="text" class="form-control" name="CaLam" value="<?php echo $row['CaLam']; ?>" required><br>
                        </div>

                        <div class="content">
                            <br><input style="padding: 0.25em 1.4em;margin-left: 75%;" type="submit" value="Lưu">
                            <a style="color: #fff;padding: 0.7em 0.5em;margin-left: 3%;" href="quanlylichlamviec.php">Quay lại</a>
                        </div>
                    </form>
                </div>
                <?php
            }
        }
    }
    mysqli_close($conn);
    ?>
</body>
</html>