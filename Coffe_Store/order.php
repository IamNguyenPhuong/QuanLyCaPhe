<html>
<head>
    <title>Selected Food</title>
    <style>
        /* CSS để định nghĩa màu nền cho class brown-bg */
        .brown-bg {
            background-color: rgb(241, 228, 163); /* Màu nâu (SaddleBrown) */
            padding: 20px; /* Thêm padding cho fieldset */
            border-radius: 8px; /* Bo tròn viền */  
            color: black; /* Màu chữ là màu trắng */
        }
        /* Thêm một số CSS để chỉnh sửa giao diện cho phần tử khác */
        .food-menu-img img {
            max-width: 100%;
            height: auto;
        }

    </style>
</head>
<body>
<?php ob_start(); include('partials-front/header.php') ?>
    <!-- Navbar Section Ends Here -->


    <?php
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if(isset($_POST['addcart'])){
        if (count($_SESSION['cart'])==0){
            $cartmini = ['img' => $_POST['img'], 'nameProduct' => $_POST['nameProduct'], 'price' => $_POST['price'], 'quantity' => $_POST['quantity'], 'total' => ($_POST['price']*$_POST['quantity']),'idsp' => $_GET['menu_id']];
            $_SESSION['cart'][] = $cartmini;
        }else{
            $check = 0;
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                $item = $_SESSION['cart'][$i];
                if ($_GET['menu_id'] == $item['idsp']) {
                    $_SESSION['cart'][$i]['quantity'] = $_POST['quantity'] + $item['quantity'];
                    $_SESSION['cart'][$i]['total'] = $_SESSION['cart'][$i]['quantity']*$item['price'];
                    $check = 1;
                    break;
                }
            }
            if ($check == 0) {
            $cartmini = ['img' => $_POST['img'], 'nameProduct' => $_POST['nameProduct'], 'price' => $_POST['price'], 'quantity' => $_POST['quantity'], 'total' => ($_POST['price']*$_POST['quantity']),'idsp' => $_GET['menu_id']];
            $_SESSION['cart'][] = $cartmini;
            }
        }
        echo"<script>alert('Đã thêm vào giỏ hàng')</script>";
    }
        if(isset($_GET['menu_id']))
        {
            //Get the food id and details of selected food
            $menu_id=$_GET['menu_id'];

            //GET the detail of the selected food
            $sql="SELECT * FROM tbl_menu WHERE id=$menu_id";

            //Execute the Query
            $res=mysqli_query($conn,$sql);

            //Count he rows
            $count=mysqli_num_rows($res);
            //Check whether the data is available or not
            if($count==1)
            {
                //We have data
                //Get the data from database
                $row=mysqli_fetch_assoc($res);

                $title=$row['title'];
                $price=$row['price'];
                $image_name=$row['image_name'];
            }
            else
            {
                //food not available
                //Redirect
                header('location: '.SITEURL);
            }
        }
        else
        {
            header('location: '.SITEURL);
        }
        
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center" style="color:red">Food detail.</h2>

            <form action="" method="POST" class="order">
            <fieldset class="brown-bg">
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
                            //Check whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not available
                                echo "<div class='error'>Image not available</div>";
                            }
                            else
                            {
                                //Image is available
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/menu/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    
                                <?php
                            }
                        ?>
                        
                    </div>
    
                        <div class="food-menu-desc">
        <h3><?php echo $title; ?></h3>
        <input type="hidden" name="menu" value="<?php echo $title; ?>">

        <p class="food-price" id="food-price"><?php echo $price; ?></p>

        <div class="order-label">Quantity</div>
        <input type="number" name="quantity" class="input-responsive" value="1" max="10" min="1" id="quantity" oninput="calculateTotal()" required>
        <p>Total: <span id="total"><?php echo $price; ?></span></p>
        <input type="text" name="img" value="<?php echo $image_name; ?>" hidden>
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <input type="text" name="nameProduct" value="<?php echo $title; ?>" hidden>
        <button type="submit" name="addcart">ADD TO CART</button>
    </div>


                </fieldset>
                
                

            </form>

            

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php include('partials-front/footer.php'); ?>
    <script>
    function calculateTotal() {
        var price = parseFloat(document.getElementById('food-price').innerHTML);
        var quantity = parseFloat(document.getElementById('quantity').value);
        var total = price * quantity;
        document.getElementById('total').innerHTML = total;
    }
</script>