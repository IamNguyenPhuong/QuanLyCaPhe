<?php include('partials/header.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>
            
        <?php
            //Check whether id is set or not
            if(isset($_GET['id']))
            {
                //Get the order details
                $id=$_GET['id'];
                //SQL Query to get the order details
                $sql="SELECT * FROM tbl_donhang WHERE id=$id";
                //Execute the Query
                $res=mysqli_query($conn,$sql);
                //Count rows
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    //Detail available
                    $row=mysqli_fetch_assoc($res);

                    $menu=$row['menu'];
                    $price=$row['price'];
                    $quantity=$row['quantity'];
                    $status=$row['status']; 
                    $customer_name=$row['customer_name'];
                    $customer_contact=$row['customer_contact'];
                    $customer_email=$row['customer_email'];
                    $customer_address=$row['customer_address'];
                }
                else
                {
                    //Detail not available
                    //Redirect to manage order
                    header('location: '.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                //Redirect to manage order page
                header('location: '.SITEURL.'admin/manage-order.php');
            }
        ?>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Food Name</td>
                    <td><?php echo $menu; ?></td>
                </tr>

                <tr>
                    <td>Price </td>
                    <td><?php echo $price; ?></td>
                </tr>

                <tr>
                    <td>Quantity</td>
                    <td>
                        <input type="number" name ="quantity" value="<?php echo $quantity; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                 </tr>

                 <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                 </tr>

                 <tr>
                    <td>Customer Email: </td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                 </tr>

                 <tr>
                    <td>Customer Address: </td>
                    <td>
                        <textarea name="customer_address" col="30" row="5"><?php echo $customer_address; ?></textarea>
                    </td>
                 </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="order" value="Update Order" class="btn-secondary">
                </tr>
            </table>
        </form>
        
        
    </div>
</div>

<?php include('partials/footer.php')?>