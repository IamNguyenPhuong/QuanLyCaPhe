<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<html>
<head>
    <title>Danh sách thông tin người dùng và Đơn hàng</title>
    <style>
        .container {
            display: flex;
        }

        .table-container {
            width: 50%; /* Điều chỉnh kích thước container nếu cần */
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Danh sách thông tin người dùng và Đơn hàng</h1>

    <div class="container">
        <div class="table-container">
            <h2>Danh sách thông tin người dùng</h2>
            <a href="add_user.php" class="add-button">Thêm</a>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
                <?php
                // Kết nối đến cơ sở dữ liệu
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "coffeestore";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                }

                // Truy vấn dữ liệu từ bảng tbl_coffee_users
                $sql = "SELECT * FROM tbl_coffee_users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["uid"] . "</td>";
                        echo "<td>" . $row["fullname"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo '<td><a href="edit_user.php?id=' . $row["uid"] . '">Sửa</a></td>';
                        echo '<td><a href="delete_user.php?id=' . $row["uid"] . '">Xoá</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "Không có dữ liệu trong bảng tbl_coffee_users.";
                }
                ?>
            </table>
        </div>

        <div class="table-container">
            <h2>Danh sách Đơn hàng</h2>
            <a href="add_order.php" class="add-button">Thêm</a>
            
            <table>
                <tr>
                    <th>ID</th>
                    <th>Menu</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Customer Contact</th>
                    <th>Customer Email</th>
                    <th>Customer Address</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
                <?php
                // Kết nối đến cơ sở dữ liệu
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "coffeestore";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                }

                // Truy vấn dữ liệu từ bảng tbl_donhang
                $sql = "SELECT * FROM tbl_donhang";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["menu"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td>" . $row["total"] . "</td>";
                        echo "<td>" . $row["order_date"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td>" . $row["customer_name"] . "</td>";
                        echo "<td>" . $row["customer_contact"] . "</td>";
                        echo "<td>" . $row["customer_email"] . "</td>";
                        echo "<td>" . $row["customer_address"] . "</td>";
                        echo '<td><a href="edit_order.php?id=' . $row["id"] . '">Sửa</a></td>';
                        echo '<td><a href="delete_order.php?id=' . $row["id"] . '">Xoá</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "Không có dữ liệu trong bảng tbl_donhang.";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>