<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
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

    // Thực hiện cập nhật thông tin hoá đơn trong bảng tbl_donhang
    $sql = "UPDATE tbl_donhang SET 
            menu='$menu', 
            price='$price', 
            quantity='$quantity', 
            total='$total', 
            order_date='$order_date', 
            status='$status', 
            customer_name='$customer_name', 
            customer_contact='$customer_contact', 
            customer_email='$customer_email', 
            customer_address='$customer_address' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
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
    <title>Sửa thông tin</title>
</head>
<body>
    <h1>Sửa thông tin đơn hàng</h1>
    <!-- Form để sửa thông tin -->
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <label for="menu">Menu:</label>
        <input type="text" name="menu" required><br>
        <label for="price">Price:</label>
        <input type="number" name="price" required><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required><br>
        <label for="total">Total:</label>
        <input type="number" name="total" required><br>
        <label for="order_date">Order Date:</label>
        <input type="date" name="order_date" required><br>
        <label for="status">Status:</label>
        <input type="text" name="status" required><br>
        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" required><br>
        <label for="customer_contact">Customer Contact:</label>
        <input type="text" name="customer_contact" required><br>
        <label for="customer_email">Customer Email:</label>
        <input type="email" name="customer_email" required><br>
        <label for="customer_address">Customer Address:</label>
        <input type="text" name="customer_address" required><br>
        <input type="submit" value="Xác nhận sửa">
    </form>
</body>
</html>