<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Staff_management</title>
</head>
<body>
    
</body>
</html>

<html>
<head>
    <title>Quản lý Nhân Viên</title>
    <script>
        function validateForm() {
            var MaNV = document.forms["nhanVienForm"]["MaNV"].value;
            var SoDienThoai = document.forms["nhanVienForm"]["SoDienThoai"].value;
            var Email = document.forms["nhanVienForm"]["Email"].value;

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

            $sql_all_SoDienThoai = "SELECT SoDienThoai FROM tbl_ttnv";
            $result_all_SoDienThoai = $conn->query($sql_all_SoDienThoai);
            while($row = $result_all_SoDienThoai->fetch_assoc()) {
                echo "if (SoDienThoai === '".$row["SoDienThoai"]."') { isDuplicate = true; duplicateMessage += 'Số điện thoại, '; }";
            }

            $sql_all_Email = "SELECT Email FROM tbl_ttnv";
            $result_all_Email = $conn->query($sql_all_Email);
            while($row = $result_all_Email->fetch_assoc()) {
                echo "if (Email === '".$row["Email"]."') { isDuplicate = true; duplicateMessage += 'Email, '; }";
            }
            ?>

            if (isDuplicate) {
                duplicateMessage = duplicateMessage.slice(0, -2); // Loại bỏ dấu phẩy cuối cùng
                alert(duplicateMessage);
                return false;
            }
        }
    </script>
</head>
<body>
<div id = "container">
<div id = "add_employee" >
    <h1>Quản lý Nhân Viên</h1>
    <a style="color: blue;padding: 0.7em 0.5em;" href = "../trangchu/trangchuquanly.php">Quay lai</a>
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

                $sql_check_Email = "SELECT * FROM tbl_ttnv WHERE Email = '$Email'";
                $result_check_Email = $conn->query($sql_check_Email);

                $sql_check_SoDienThoai = "SELECT * FROM tbl_ttnv WHERE SoDienThoai = '$SoDienThoai'";
                $result_check_SoDienThoai = $conn->query($sql_check_SoDienThoai);

                if ($result_check_MaNV->num_rows > 0) {
                    echo "Mã nhân viên đã tồn tại. Vui lòng chọn mã khác.";
                } elseif ($result_check_Email->num_rows > 0) {
                    echo "Email đã tồn tại. Vui lòng sử dụng địa chỉ email khác.";
                } elseif ($result_check_SoDienThoai->num_rows > 0) {
                    echo "Số điện thoại đã tồn tại. Vui lòng sử dụng số điện thoại khác.";
                } else {
                    $sql = "INSERT INTO tbl_ttnv (MaNV, HoTen, GioiTinh, NamSinh, SoDienThoai, Email)
                            VALUES ('$MaNV', '$HoTen', '$GioiTinh', '$NamSinh', '$SoDienThoai', '$Email')";

                    if ($conn->query($sql) === TRUE) {
                        echo "Thêm nhân viên thành công!";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                }
            } else {
                echo "Số điện thoại phải chứa đúng 10 số.";
            }
        }
    }
    ?>

    <form name="nhanVienForm" method="post" action="index.php" onsubmit="return validateForm()">
        <label for="MaNV">Mã nhân viên:</label>
        <input type="text" name="MaNV" required><br><br>

        <label for="HoTen">Họ và Tên:</label>
        <input type="text" name="HoTen" required><br><br>

        <label>Giới tính:</label>
        <select name="GioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br><br>

        <label for="NamSinh">Năm sinh:</label>
        <input type="date" name="NamSinh" required><br><br>

        <label for="SoDienThoai">Số điện thoại:</label>
        <input type="text" name="SoDienThoai" required maxlength="10"><br><br>

        <label for="Email">Email:</label>
        <input type="email" name="Email" required><br><br>

        <input type="submit" name="submit" value="Lưu">
    </form>
</div>

<div id = "employee_list">
    <!-- Hiển thị danh sách nhân viên -->
    <h2>Danh sách Nhân Viên</h2>

    <div id="search-container">
        <input type="text" id="search-name" placeholder="Tìm kiếm theo Tên" onkeyup="searchTable()">
    </div>

    <table border="1" id="employee-table">

        <tr>
            <th>Mã NV</th>
            <th>Họ và Tên</th>
            <th>Giới Tính</th>
            <th>Năm Sinh</th>
            <th>Số Điện Thoai</th>
            <th>Email</th>
            <th>Thao tác</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tbl_ttnv";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["MaNV"] . "</td>";
                echo "<td>" . $row["HoTen"] . "</td>";
                echo "<td>" . $row["GioiTinh"] . "</td>";
                echo "<td>" . $row["NamSinh"] . "</td>";
                echo "<td>" .'0'. $row["SoDienThoai"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td><a href='edit.php?MaNV=" . $row["MaNV"] . "'>Sửa</a> | <a href='delete.php?MaNV=" . $row["MaNV"] . "'>Xoá</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Không có dữ liệu.</td></tr>";
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>

<script>
        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("search-name");
            filter = input.value.toUpperCase();
            table = document.getElementById("employee-table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Ô thứ hai (tên)
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</div>
</div>
</body>
</html>