<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<html>
<head>
    <title>Thêm thông tin Đơn hàng</title>
</head>
<body>
    <h2>Thêm thông tin Đơn hàng</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Xử lý lưu thông tin đơn hàng vào cơ sở dữ liệu
        $menu = $_POST["menu"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $total = $_POST["total"];
        $order_date = $_POST["order_date"];
        $status = $_POST["status"];
        $customer_name = $_POST["customer_name"];
        $customer_contact = $_POST["customer_contact"];
        $customer_email = $_POST["customer_email"];
        $customer_address = $_POST["customer_address"];
    
        // Kết nối đến cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "coffeestore";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
    
        // Chuyển định dạng ngày từ yyyy-mm-dd sang yyyy-mm-dd H:i:s
        $order_date = date("Y-m-d H:i:s", strtotime($order_date));
    
        // Thực hiện truy vấn để thêm thông tin đơn hàng
        $sql = "INSERT INTO tbl_donhang (menu, price, quantity, total, order_date, status, customer_name, customer_contact, customer_email, customer_address) VALUES ('$menu', '$price', '$quantity', '$total', '$order_date', '$status', '$customer_name', '$customer_contact', '$customer_email', '$customer_address')";
    
        if ($conn->query($sql) === TRUE) {
            // Thêm thành công, chuyển hướng về trang index.php
            header("Location: index.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    ?>

    <!-- Biểu mẫu nhập thông tin mới -->
    <form method="post" action="add_order.php">
        <label for="menu">Menu:</label>
        <input type="text" id="menu" name="menu" required><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <label for="total">Total:</label>
        <input type="number" id="total" name="total" required><br><br>

        <label for="order_date">Order Date:</label>
        <input type="date" id="order_date" name="order_date" required><br><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br><br>

        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" required><br><br>

        <label for="customer_contact">Customer Contact:</label>
        <input type="text" id="customer_contact" name="customer_contact" required><br><br>

        <label for="customer_email">Customer Email:</label>
        <input type="email" id="customer_email" name="customer_email" required><br><br>

        <label for="customer_address">Customer Address:</label>
        <input type="text" id="customer_address" name="customer_address" required><br><br>

        <input type="submit" value="Xác nhận thêm">
    </form>
</body>
</html>