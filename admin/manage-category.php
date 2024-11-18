<?php include('partials/header.php');?>

<?php
include '\xampp\htdocs\QuanLyCaPhe\DANGNHAP2\check.php';
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
    <div class="sticky">
        <div class="wrapper">
        <?php 
        // session_start();
if(isset($_SESSION['usernamenhanvien'])){
    echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchunhanvien.php">Quay lại</a>';
   

}
else if(isset($_SESSION['usernameadmin'])){
    echo '<a href="http://localhost/QuanLyCaPhe/trangchu/trangchuquanly.php">Quay lại</a>';}
  
?>
            <h1>Manage Category</h1>
            <br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>
            <br>

            <!-- Button to Add Admin  -->
            <a href="add-category.php" class="btn-primary">Add Category</a>
            <br/>
            <table class="tbl-full">
                <tr>
                    <th>Serial Number</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php
                    //Query to get all category from database
                    $sql = "SELECT * FROM tbl_category";

                    //Execure Query
                    $res= mysqli_query($conn, $sql);

                    //Count Rows
                    $count =mysqli_num_rows($res);

                    //Create Serial Numer Variable and assign value as 1
                    $sn=1;
                    //Check whether we have data in dtabase or not
                    if($count > 0)
                    {
                        //We have data in database
                        //get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['id'];
                            $title=$row['title'];
                            $image_name=$row['image_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];

                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?> </td>
                                    <td><?php echo $title; ?></td>

                                    <td>
                                        <?php
                                            //Check whether image name is available or not
                                            echo $image_name;
                                            if($image_name!="")
                                            {
                                                //Display the image
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                                                    
                                                <?php
                                            }
                                            else
                                            {
                                                //Display the message
                                                echo "<div class='error'>Image not available</div>";
                                            }
                                        ?>
                                    </td>

                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id; ?>&image name=<?php echo $image_name; ?>" class="btn-secondary">Update Category</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id; ?>&image name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>

                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                        //We do not have data
                        //We'll display the message inside table
                        ?>
                            <tr>
                                <td colspan="6"><div class="error">No Category Added</div></td>
                            </tr>
                        <?php
                    }

                ?>

                
            </table>
        </div>
    </div>
</body>
</html>
<?php include('partials/footer.php');?>