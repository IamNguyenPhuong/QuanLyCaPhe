<?php include('config/constants.php');
session_start();
if(isset($_POST['order']))
{
    foreach ($_SESSION['cart'] as $key) {
        $menu=$key['nameProduct'];
        $price=$key['price'];
        $quantity =$key['quantity'];

        $total=$price * $quantity;
        $order_date=date("Y-m-d H:i:sa"); //Order date

        $status="Ordered"; //Ordered, on delivery, delivered, cancelied

        $customer_name=$_POST['full-name'];
        $customer_contact=$_POST['contact'];
        $customer_email = $_POST['email'];
        $customer_address=$_POST['address'];

        //Save the order in database
        //Create SQL to save the data
        $sql2="INSERT INTO tbl_donhang SET
            menu='$menu',
            price=$price,
            quantity=$quantity,
            total=$total,
            order_date='$order_date',
            status='$status',
            customer_name='$customer_name',
            customer_contact='$customer_contact',
            customer_email='$customer_email',
            customer_address='$customer_address'
        ";

        //Execute the Query
        $res2=mysqli_query($conn,$sql2);

        //Check whether query executed successfully or not
        
        
    }

    if($res2){
        header('Location: trangchu3.php?done=1');

    }
    //Get all the details from the form
}


?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <!-- Top Block -->
        <div class="top-block">
            <div class="logo">
                <img src="https://t4.ftcdn.net/jpg/05/14/51/79/360_F_514517927_dXLi1DauUmrCaE3AkElsVgJ1jaYZMcSA.jpg" alt="Coffee Shop Logo">
                <h1 style="font-family: Cursive;">Coffee</h1>
            </div>
            
            <div class="shop-info">
                <div class="actions">
                <a class="row" href="http://localhost/QuanLyCaPhe/Coffe_Store/cart.php" ><img src="https://banner2.cleanpng.com/20180705/azf/kisspng-shopping-cart-software-computer-icons-shopping-icon-5b3eb003bbc062.574139001530834947769.jpg" alt=""></a>
                    
                    <?php
                        
                        if(isset($_SESSION['username'])){
                            echo "Xin chào, ".$_SESSION['username']."!";
                            echo "<br><a href='/QuanLyCaPhe/Coffe_Store/DANGNHAP/logout.php'>Đăng xuất</a>";
                        } else {
                            echo '<a href="http://localhost/QuanLyCaPhe/Coffe_Store/DANGNHAP/signin.php">Đăng nhập</a>';
                            echo '<a href="http://localhost/QuanLyCaPhe/Coffe_Store/DANGKY/signup.php">Đăng kí</a>';
                        }
                    ?>
                    
                   
                    
                    
                </div>
            </div>
            
        </div>

        <!-- Navigation Bar -->
            <nav>
                <ul>
                    <li><a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/trangchu3.php">Trang chủ</a></li>
                    <li><a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/Tintuc/tintuc1.php">Tin tức</a></li>
                    <li><a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/categories.php">Danh mục</a></li>
                    <li><a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/menu.php">Menu</a></li>
                    <li><a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/TAIKHOAN/account.php">Quản lý tài khoản</a></li>
                    <li><a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/Tintuc/tuyendung.php">Tuyển dụng</a></li>
                    
                </ul>
                <button class="menu-button" id="menu-toggle">&#9776;</button>
                <div class="menu-list" id="menu-list">
                <a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/trangchu3.php">Trang chủ</a>
                <a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/Tintuc/tintuc1.php">Tin tức</a>
                <a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/categories.php">Danh mục</a>
                <a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/menu.php">Menu</a>
                <a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/TAIKHOAN/account.php">Quản lý tài khoản</a>
                <a href="<?php echo SITEURL; ?>../QuanLyCaPhe/Coffe_Store/tuyendung.php">Tuyển dụng</a>
                </div>
            </nav>
    </header>
    <script>
        // Lấy tham chiếu đến menu-toggle và menu-list
        const menuToggle = document.getElementById("menu-toggle");
        const menuList = document.getElementById("menu-list");

        // Khai báo biến để kiểm tra trạng thái menu
        let menuOpen = false;

        // Tạo hàm để hiển thị/ẩn menu
        function toggleMenu() {
            if (menuOpen) {
                menuList.style.left = "-200px"; // Ẩn menu bên trái
            } else {
                menuList.style.left = "0"; // Hiển thị menu
            }
            menuOpen = !menuOpen; // Đảo ngược trạng thái
        }

        // Thêm sự kiện click vào menu-toggle
        menuToggle.addEventListener("click", toggleMenu);
    </script>
</body>
</html>