<?php include('partials/header.php');?>


<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>
</head>
<body>
    <div class="sticky">
        <div class="wrapper">
        <?php 
if(isset($_SESSION['usernamenhanvien'])){
    echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchunhanvien.php">Quay lại</a>';
   

}
else if(isset($_SESSION['usernameadmin'])){
    echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchuquanly.php">Quay lại</a>';}
  
?>
            <h1>Manage Menu</h1>
            <br/><br/>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                
                if(isset($_SESSION['unauthorize']))
                {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }
            ?>

            <a href="add-menu.php" class="btn-primary">Add Menu</a>
            <br/>
            <table class="tbl-full">
                <tr>
                    <th>Serial Number</th>
                    <th>Title</th>
                    <!-- <th>Description</th> -->
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php
                    //Create a sql query to get all the food
                    $sql="SELECT * FROM tbl_menu";

                    //Execute the query
                    $res=mysqli_query($conn,$sql);

                    //Count rows to check whether we have food or not
                    $count=mysqli_num_rows($res);

                    //Create serial number variable and set default value as 1
                    $sn=1;

                    if($count>0)
                    {
                        //We have food in database
                        //Set the foods from database and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get the values from indivdual columns
                            $id=$row['id'];
                            $title=$row['title'];
                            $price=$row['price'];
                            $image_name=$row['image_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];
                            ?>
                                <tr>
                                    <td><?php echo$sn++; ?> </td>
                                    <td><?php echo $title; ?></td>
                                    <!-- <td>Description</td> -->
                                    <td><?php echo $price; ?></td>
                                    <td>
                                        <?php 
                                            echo $image_name;
                                            //Check whether we have image or not
                                            if($image_name=="")
                                            {
                                                //We do not have image, display error message
                                                echo "<div class='error'>Image not Added</div>";
                                            } 
                                            else
                                            {
                                                //We have image, display image
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>images/menu/<?php echo $image_name; ?>" width="150px">
                                                <?php
                                            }
                                        ?>
                                        
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-menu.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Update Food</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-menu.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                                    </td>
                                </tr> 
                            <?php
                        }
                    }
                    else
                    {
                        //Food no Added in database
                        echo "<tr> <td colspan='7' class='error'>Menu not Added yet</td></tr>";
                    }
                ?>            
            </table>
        </div>
    </div>
</body>
</html>
<?php include('partials/footer.php');?>