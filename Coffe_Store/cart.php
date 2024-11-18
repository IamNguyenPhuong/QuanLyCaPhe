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
<?php ob_start();

include('partials-front/header.php');
if(!isset($_SESSION['username'])){
    header("Location: DANGNHAP/signin.php?login=1");
}
if(isset($_GET['del'])){
    array_splice($_SESSION['cart'], $_GET['del'], 1);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if(count($_SESSION['cart'])==0){
    header("Location: menu.php?buy=1");
}
                
                // Check whether submit button is clicked or not
                
    // // Get the food id and details of selected food
    // $menu_id = $_GET['menu_id'];

    // // Establish your database connection ($conn assumed to be available)

    // // Prepare the SQL statement with a placeholder
    // $sql = "SELECT * FROM tbl_menu WHERE id = ?";
    
    // // Prepare and bind the statement
    // $stmt = mysqli_prepare($conn, $sql);
    // mysqli_stmt_bind_param($stmt, 'i', $menu_id);
    
    // // Execute the statement
    // mysqli_stmt_execute($stmt);

    // // Get the result
    // $res = mysqli_stmt_get_result($stmt);

    // // Check whether the data is available or not
    // if ($row = mysqli_fetch_assoc($res)) {
    //     // We have data
    //     // Get the data from the database
    //     $title = $row['title'];
    //     $price = $row['price'];
    //     $image_name = $row['image_name'];
    // } 

?>

<div id="container" style="display:flex;flex-direction:column;justify-content:center;width:100%">
<table class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tong=0;
            $i=0;
                if(isset($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $key) {
                        $tong=$tong+$key['total'];
                        echo'
                        <tr>
            <td><img src="images/menu/'.$key['img'].'" alt="Chicke Hawain Pizza" width="50px" class="img-responsive img-curve"></td>
            <td>'.$key['nameProduct'].'</td>
            <td>'.$key['price'].' vnđ</td>
            <td>'.$key['quantity'].'</td>
            <td>'.$key['total'].' vnđ</td>
            <td><a href="cart.php?del='.$i.'">Xóa</a></td>
            </tr>
                        ';
                        $i++;
                    }
                }
            ?>
        </tbody>
        <thead>
            <tr>
                <td colspan="4" style="font-size:40px;font-weight:bold;color:red;">TOTAL :</td>
                <td><?php echo  $tong.' vnđ'; ?></td>
            </tr>
        </thead>
    </table>
    <br>
    <br>
    <br>
    <form action="" method="POST">
    <fieldset class="">
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
    <input type="text" name="full-name" placeholder="E.g. Nguyễn Văn A" class="input-responsive" value="<?php echo isset( $_SESSION['fullname']) ?  $_SESSION['fullname'] : ''; ?>" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 0xxxxxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
    <input type="email" name="email" placeholder="E.g. nguyenvana@gmail.com" class="input-responsive" value="<?php echo isset($_SESSION['email']) ?$_SESSION['email'] : ''; ?>" required>

    <div class="order-label">Address</div>
    <textarea name="address" rows="10" placeholder="E.g. Street, District, City" class="input-responsive" required><?php echo isset($_SESSION['address']) ?$_SESSION['address'] : ''; ?></textarea>

                 </fieldset>
    <div id="btn" style="display:flex; justify-content:right;">
    <input type="number" value="<?php echo  $tong; ?>" name="total" hidden>
    <button type="submit" name="order" style="width:10%; height:50px;">ĐẶT HÀNG</button>
    </div>
    </form>
    
    <br>
    <br>
    <br>
</div>
 <?php include('partials-front/footer.php'); ?>