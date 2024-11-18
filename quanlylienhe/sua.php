<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa liên hệ</title>
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
    <?php
    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "coffeestore");

    if (!$conn) {
        die("Lỗi kết nối: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Message = $_POST['message'];

        // Cập nhật thông tin liên hệ
        $sql = "UPDATE tbl_lienhe SET
            name = '$Name',
            message = '$Message'
            WHERE Email = '$Email'";

        if (mysqli_query($conn, $sql)) {
            echo "<script > alert('Cập nhật thành công');
            window.location.href='danhsachlienhe.php';
            </script>";
            // Chuyển hướng về trang danhsachlienhe.php sau 2 giây
            // header("refresh:2;url=danhsachlienhe.php");
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    } else {
        if (isset($_GET['email'])) {
            $Email = $_GET['email'];

            // Lấy thông tin của nhân viên cần sửa
            $sql = "SELECT * FROM tbl_lienhe WHERE email = '$Email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="container">
                    <h1 style="text-align: center;">Cập nhật thông tin</h1>
                    <form action="sua.php?email=<?php echo $Email; ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required><br>
                            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                            
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <input class="form-control" name="message" value="<?php echo $row['message']; ?>" required><br>
                        </div>
                        <div class="content">
                            <br><input style="padding: 0.25em 1.4em;margin-left: 75%;" type="submit" value="Lưu">
                            <a style="color: #fff;padding: 0.7em 0.5em;margin-left: 3%;" href = "danhsachlienhe.php">Quay lai</a>
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