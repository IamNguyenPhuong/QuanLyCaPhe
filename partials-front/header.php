<?php include('config/constants.php')?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">
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
                    <a class="row" href="#" ><img src="https://banner2.cleanpng.com/20180705/azf/kisspng-shopping-cart-software-computer-icons-shopping-icon-5b3eb003bbc062.574139001530834947769.jpg" alt=""></a>
                    <a href="#">Đăng nhập</a>
                    <a href="#">Đăng kí</a>
                </div>
            </div>
            
        </div>

        <!-- Navigation Bar -->
            <nav>
                <ul>
                    <li><a href="<?php echo SITEURL; ?>">Trang chủ</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="<?php echo SITEURL; ?>categories.php">Danh mục</a></li>
                    <li><a href="<?php echo SITEURL; ?>menu.php">Menu</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
                <button class="menu-button" id="menu-toggle">&#9776;</button>
                <div class="menu-list" id="menu-list">
                    <a href="#">Khách hàng</a>
                    <a href="#">Kho</a>
                </div>
            </nav>
    </header>
</body>
</html>