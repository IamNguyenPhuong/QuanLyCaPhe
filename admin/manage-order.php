<?php include('partials/header.php');
?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
        <?php 
if(isset($_SESSION['usernamenhanvien'])){
    echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchunhanvien.php">Quay lại</a>';
   

}
else if(isset($_SESSION['usernameadmin'])){
    echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchuquanly.php">Quay lại</a>';}
  
?>
  
            <h1>Manage Order</h1>
            <br/><br/><br/>
            <form action="" method="post">
                <label for=""><h2>Tìm kiếm hóa đơn theo ngày:</h2></label>
                <input type="date" name="ngay">
                <button type="submit" name="search">Tìm kiếm</button>
            </form>
            <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Contract</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>

                <?php
                    if(isset($_POST['search'])){
                        $timestamp = strtotime($_POST['ngay']);
                        $ngay = date("d", $timestamp);
                        $thang = date("m", $timestamp);
                        $nam = date("Y", $timestamp);
                        $sql="SELECT * FROM tbl_donhang WHERE YEAR(order_date)='$nam' AND MONTH(order_date)='$thang' AND DAY(order_date)='$ngay'  ORDER BY id DESC";
                    }else{
                        $sql="SELECT * FROM tbl_donhang ORDER BY id DESC";
                    }
                    //Get all the order from database
                    
                    //Execute Query
                    $res=mysqli_query($conn,$sql);
                    //Count the rows
                    $count=mysqli_num_rows($res);

                    $sn=1;

                    if($count>0)
                    {
                        //Order Available
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['id'];
                            $menu=$row['menu'];
                            $price=$row['price'];
                            $quantity=$row['quantity'];
                            $total=$row['total'];
                            $order_date=$row['order_date'];
                            $status=$row['status'];
                            $customer_name=$row['customer_name'];
                            $customer_contact=$row['customer_contact'];
                            $customer_email=$row['customer_email'];
                            $customer_address=$row['customer_address'];

                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $menu; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $quantity; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><?php echo $order_date; ?></td>
                                    <td>
                                        <?php
                                            if($status == "Ordered")
                                            {
                                                echo "<label>$status</label>";
                                            }
                                            elseif($status == "On Delivery")
                                            {
                                                echo "<label style ='color: orange;'>$status</label>";
                                            }
                                            elseif($status == "Delivered")
                                            {
                                                echo "<label style ='color: green;'>$status</label>";
                                            }
                                            elseif($status == "Cancelled")
                                            {
                                                echo "<label style ='color: red;' >$status</label>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $customer_contact; ?></td>
                                    <td><?php echo $customer_email; ?></td>
                                    <td><?php echo $customer_address; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>&menu=<?php echo $menu; ?>" class="btn-secondary">Update Order</a>
                                    </td>
                                </tr>
                            <?php
                        }

                    }
                    else
                    {
                        //Order not Available
                        echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                    }
                ?>
                
            </table>

        </div>
    </div>
</body>
</html>
<?php include('partials/footer.php');?>